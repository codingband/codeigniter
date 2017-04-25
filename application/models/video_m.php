<?php
/**
 * User model
 */
class Video_m extends CI_Model{
	
	/**
	 * Insert a new register
	 * @param array $values
	 */
	public function insert($values)
        {
            $this->db->insert('video', $values);
            $id = $this->db->insert_id();
            return $id;
	}
	
	public function update($id, $values){	
		$this->db->where('video_id', $id);
		return $this->db->update('video', $values);
	}
	
	public function delete($id){	
		$this->db->where('video_id', $id);
		return $this->db->delete('video');
	
	}
	
	public function video($id){	
		$this->db->where('video_id', $id);
		$query = $this->db->get('video');
		if ($query->num_rows()>0) {
			return $query->row();
		}
		return NULL;
	}
	
	public function videos($amount, $start, $field, $orientation, $criteria_array) {
		if ($criteria_array['status']) {
			$this->db->like('status', $criteria_array['status']);
		}
		$this->db->order_by($field, $orientation); 
		$this->db->limit($amount, $start);
		$query = $this->db->get('video');
		return $query->result();
	}
	
	public function amount($criteria_array){
		if ($criteria_array['status']) {
			$this->db->like('status', $criteria_array['status']);
		} 
		$query = $this->db->get('video');
		return $query->num_rows();
	}
        
        public function getStatusNotifVideo($video_id)
        {
            $result = $this->db->where('video_id',$video_id)->get('send_attempt');
            $status = '';
            
            if($result->num_rows() > 0)
            {
                $attempt = $result->row();
                
                if($attempt->status == 1)
                {
                    $status = 'Completada';
                }else{
                    $status = 'Pendiente';
                }
            }else{
                $status = 'No iniciada';
            }
            
            return $status;
        }
	
        public function send_emails_posts($users)
        {
            $type = $this->input->post('type');
            
            if($type == 1)
            {
                $id_video = $this->input->post('id_video');
                $result = $this->db->where('video_id',$id_video)->get('send_attempt');
                $video = $this->db->where('video_id',$id_video)->get('video');
                $status = "progress";

                $video = $this->video($id_video);
                /*
                $this->send_email('nicolas@tb-la.com',$video);
                $this->send_email('tbagencia@gmail.com',$video);
                $this->send_email('ivan.jordan@ideasoftinc.com',$video);
                $this->send_email('ivan.jordan@gmail.com',$video);
                $this->send_email('david.pierola.is@gmail.com',$video);
                $this->send_email('david.pierola@ideasoftinc.net',$video);
                $this->send_email('jdpapiero@yahoo.es',$video);
                $this->send_email('jdpa9@hotmail.com',$video);
                
                sleep(2); 
                $status = "complete";
                return $status;
                die();*/

                if($result->num_rows() > 0)
                {
                    $attempt = $result->row();
                    $id_attempt = $attempt->send_attempt_id;
                    $status_attempt = $attempt->status;
                    $users_attempt = $this->db->select('attempt.attempt_id, facebook_user.facebook_user_id, facebook_user.facebook_id, facebook_user.facebook_token, facebook_user.email, facebook_user.send_post, facebook_user.send_email')
                            ->from('attempt')
                            ->join('facebook_user','facebook_user.facebook_user_id = attempt.facebook_user_id')
                            ->where('attempt.send_attempt_id',$id_attempt)
                            ->where('attempt.send_status','0')
                            ->where('facebook_user.user_status = 1')
                            ->order_by('attempt_id','DESC')
                            ->limit('20')
                            ->get();
                }else{
                    $this->db->insert('send_attempt',array('video_id' => $id_video, 'start_date' => Date('Y-m-d H:i:s'), 'status' => 0));
                    $id_attempt = mysql_insert_id();
                    $status_attempt = 0;

                    foreach($users as $opt)
                    {
                        $this->db->insert('attempt',array('send_attempt_id' => $id_attempt, 'facebook_user_id' => $opt->facebook_user_id));
                    }
                }

                if($status_attempt == 0)
                {
                    $users_attempt = $this->db->select('attempt.attempt_id, attempt.post_status, attempt.email_status, facebook_user.facebook_user_id, facebook_user.facebook_id, facebook_user.facebook_token, facebook_user.email, facebook_user.send_post, facebook_user.send_email')
                                ->from('attempt')
                                ->join('facebook_user','facebook_user.facebook_user_id = attempt.facebook_user_id')
                                ->where('attempt.send_attempt_id',$id_attempt)
                                ->where('attempt.send_status','0')
                                ->where('facebook_user.user_status = 1')
                                ->order_by('attempt_id','DESC')
                                ->limit('20')
                                ->get();

                    $ammount = $users_attempt->num_rows();

                    if($ammount > 0)
                    {
                        $video = $this->video($id_video);
                        $attempt_users = $users_attempt->result();

                        foreach($attempt_users as $user)
                        {
                            if($user->send_post == 1)
                            {
                                //preguntar si ya esta en estado 1 en la DB
                                $result = $this->db->where('attempt_id',$user->attempt_id)
                                        ->where('post_status',0)->get('attempt');

                                if($result->num_rows() > 0)
                                {
                                    $res = $this->send_post($user->facebook_id, $user->facebook_token,$video->url);
                                    $this->db->where('attempt_id',$user->attempt_id)
                                    ->update('attempt',array('post_status' => 1));
                                }
                            }

                            if($user->send_email == 1)
                            {
                                //preguntar si ya esta en estado 1 en la DB
                                $result = $this->db->where('attempt_id',$user->attempt_id)
                                        ->where('email_status',0)->get('attempt');

                                if($result->num_rows() > 0)
                                {
                                    $res = $this->send_email($user->email,$video);
                                    $this->db->where('attempt_id',$user->attempt_id)
                                    ->update('attempt',array('email_status' => 1));
                                }

                            }

                            $this->db->where('attempt_id',$user->attempt_id)
                                ->update('attempt',array('send_status' => 1, 'send_date' => Date('Y-m-d H:i:s')));
                        }

                        $status = "progress";
                    }else{
                        $this->db->where('send_attempt_id',$id_attempt)->update('send_attempt',array('status' => 1, 'end_date' => Date('Y-m-d H:i:s')));
                        $status = "complete";
                    }
                }else{
                    $status = "complete";
                }

                return $status;
            }
            
            if($type == 2)
            {
                $id_video = $this->input->post('id_video');
                $result = $this->db->where('video_id',$id_video)->get('send_attempt');
                $users = $this->db->get('facebook_user');
                $return = '';

                if($result->num_rows() > 0)
                {
                    $obj = $result->row();
                    $result2 = $this->db->where('send_attempt_id',$obj->send_attempt_id)->get('attempt');

                    if($result2->num_rows() > 0)
                    {
                        $total = $result2->num_rows();
                        $result3 = $this->db->where('send_attempt_id',$obj->send_attempt_id)->where('send_status',1)->get('attempt');
                        $since = $result3->num_rows()+1;
                        $until = $since+20;

                        if($until > $total)
                        {
                            $until = $total;
                        }

                        $return = $since.'|'.$until.'|'.$total;
                    }else{
                        $return = '0|20|'.$users->num_rows();
                    }
                }else{
                    $return = '0|20|'.$users->num_rows();
                }

                return $return;
            }
        }
        
        public function send_email($email, $video = NULL)
        {
            $c1 = base_url().'img/email/c1.jpg';//%c1%
            $c2d = base_url().'img/email/c2_derecha.jpg';//%c2d%
            $c2i = base_url().'img/email/c2_izquierda.jpg';//%c2i%
            $c3 = base_url().'img/email/c3.jpg';//%c3%
            $c4d = base_url().'img/email/c4_derecha.jpg'; //%c4d%
            $c4i = base_url().'img/email/c4_izquierda.jpg'; //%c4i%
            $c5 = base_url().'img/email/c5.jpg'; //%c5%
            
            //$img_email = base_url().'img/email/email.png';//%email%
            
            /*$header = base_url().'img/email/head.png';//%header%
            $left = base_url().'img/email/left.png';//%left%
            $center = base_url().'img/email/center.png';//%center%
            $right = base_url().'img/email/right.png';//%right%
            $foot = base_url().'img/email/foot.png'; //%foot%*/
            //$url = 'https://www.facebook.com/bancogalicia?v=app_183560071776619&sk=app_183560071776619';//%url%
            $url = $this->config->item('url_email_send');//%url%
            $message = file_get_contents(base_url().'template_email/template.html');
            $message = str_replace('%url%',$url,$message);
            $message = str_replace('%c1%',$c1,$message);
            $message = str_replace('%c2d%',$c2d,$message);
            $message = str_replace('%c2i%',$c2i,$message);
            $message = str_replace('%c3%',$c3,$message);
            $message = str_replace('%c4d%',$c4d,$message);
            $message = str_replace('%c4i%',$c4i,$message);
            $message = str_replace('%c5%',$c5,$message);
            
            /*$message = str_replace('%url%',$url,$message);
            $message = str_replace('%head%',$header,$message);
            $message = str_replace('%left%',$left,$message);
            $message = str_replace('%center%',$center,$message); 
            $message = str_replace('%right%', $right, $message);*/
            //$message_html = str_replace('%foot%',$foot,$message);
            
            //$message_html = str_replace('%email%',$img_email,$message);
            $message_html = $message;
            
            $user_mailer = $this->config->item('user_mailer');
            $pwd_mailer = $this->config->item('pwd_mailer');
            $subject_mailer = $this->config->item('subject_mailer');
            $message_mailer = $this->config->item('message_mailer');
            $email_mailer = $this->config->item('email_mailer');
            
            $this->load->library('email');
            $this->email->initialize(array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_user' => $user_mailer,
            'smtp_pass' => $pwd_mailer,
            'smtp_port' => 587,
            'crlf' => "\r\n",
            'newline' => "\r\n",
            'mailtype' => 'html'
            ));
            
            $this->email->from($email_mailer,'Equipados');
            $this->email->to($email);
            $this->email->subject($video->subject);
            $this->email->message($message_html);
            $this->email->set_alt_message($message_mailer);
            
            $this->email->send();
            //echo $this->email->print_debugger();
            //exit;
            return true;
        }
        
        public function send_post($uidfb, $token, $url_video)
        {
            $name_post = $this->config->item('name_post_wall');
            $descrip_post = $this->config->item('descrip_post_wall');
            $msg_post = $this->config->item('message_post_wall');
            $img_post = PATH_IMAGES_BE.$this->config->item('image_post_wall');
            $url_post = $this->config->item('url_post_wall');
            $url = "https://graph.facebook.com/".$uidfb."/feed?access_token=".$token;
            $fields = 'message='.utf8_encode($msg_post).$url_post;
            $fields .= '&link='.$url_video.'&name='.$name_post.'&caption='.$url_post.'&description='.utf8_encode($descrip_post);
            $post = curl_init();
            curl_setopt($post, CURLOPT_URL, $url);
            curl_setopt($post, CURLOPT_POST, 1);
            curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($post);
            curl_close($post);
            return true;
        }
}

?>
