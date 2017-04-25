<?php
/**
 * Statistics model
 */
class Statistic_m extends CI_Model
{
    public function getAmmountUsers($ini,$fin)
    {
        if($ini == 'null' && $fin == 'null')
        {
            $result = $this->db->get('facebook_user');
        }else{
            if($ini != 'null' && $fin != 'null')
            {
                $result = $this->db->where('date_subcription <=',$fin)
                        ->where('date_subcription >=',$ini)
                        ->get('facebook_user');
            }else{
                if($ini == 'null')
                {
                    $result = $this->db->where('date_subcription <=',$fin)->get('facebook_user');
                }else{
                    $result = $this->db->where('date_subcription >=',$ini)->get('facebook_user');
                }
            }
        }
        
        return $result->num_rows();
    }

    public function getAmmountTips($ini,$fin)
    {
        if($ini == 'null' && $fin == 'null')
        {
            $result = $this->db->get('publication');
        }else{
            if($ini != 'null' && $fin != 'null')
            {
                $result = $this->db->where('date <=',$fin)
                        ->where('date >=',$ini)
                        ->get('publication');
            }else{
                if($ini == 'null')
                {
                    $result = $this->db->where('date <=',$fin)->get('publication');
                }else{
                    $result = $this->db->where('date >=',$ini)->get('publication');
                }
            }
        }
        
        return $result->num_rows();
    }

    public function getAmmountsSocialTips($ini,$fin)
    {	
        if($ini == 'null' && $fin == 'null')
        {
            $where = "";
        }else{
            if($ini != 'null' && $fin != 'null')
            {
                $where = " AND date_reg_action <= '".$fin."' AND date_reg_action >= '".$ini."'";
            }else{
                if($ini == 'null')
                {
                    $where = " AND date_reg_action <= '".$fin."'";
                }else{
                    $where = " AND date_reg_action >= '".$ini."'";
                }
            }
        }
        //$query = 'SELECT SUM(likes) AS likes, SUM(tweets) AS tweets, SUM(comments) AS comments, SUM(unlikes) AS unlikes, SUM(uncomments) AS uncomments, SUM(retweets) AS retweets FROM publication';
        $query = "SELECT (SELECT COUNT(*) FROM track_social_publications WHERE action = 'likes'$where) AS likes,".
        "(SELECT COUNT(*) FROM track_social_publications WHERE action = 'unlikes'$where) AS unlikes,".
        "(SELECT COUNT(*) FROM track_social_publications WHERE action = 'tweets'$where) AS tweets,".
        "(SELECT COUNT(*) FROM track_social_publications WHERE action = 'retweets'$where) AS retweets,".
        "(SELECT COUNT(*) FROM track_social_publications WHERE action = 'comments'$where) AS comments,".
        "(SELECT COUNT(*) FROM track_social_publications WHERE action = 'uncomments'$where) AS uncomments";
        $result = $this->db->query($query);
        
        if($result->num_rows() > 0)
        {
            return $result->row();
        }else{
            return array();
        }
    }
    public function getAmmountsSocialVideos($ini,$fin)
    {	
        if($ini == 'null' && $fin == 'null')
        {
            $where = "";
        }else{
            if($ini != 'null' && $fin != 'null')
            {
                $where = " AND date_reg_action <= '".$fin."' AND date_reg_action >= '".$ini."'";
            }else{
                if($ini == 'null')
                {
                    $where = " AND date_reg_action <= '".$fin."'";
                }else{
                    $where = " AND date_reg_action >= '".$ini."'";
                }
            }
        }
        //$query = 'SELECT SUM(likes) AS likes, SUM(tweets) AS tweets, SUM(comments) AS comments, SUM(unlikes) AS unlikes, SUM(uncomments) AS uncomments, SUM(retweets) AS retweets FROM video';
        $query = "SELECT (SELECT COUNT(*) FROM track_social_videos WHERE action = 'likes'$where) AS likes,".
        "(SELECT COUNT(*) FROM track_social_videos WHERE action = 'unlikes'$where) AS unlikes,".
        "(SELECT COUNT(*) FROM track_social_videos WHERE action = 'tweets'$where) AS tweets,".
        "(SELECT COUNT(*) FROM track_social_videos WHERE action = 'retweets'$where) AS retweets,".
        "(SELECT COUNT(*) FROM track_social_videos WHERE action = 'comments'$where) AS comments,".
        "(SELECT COUNT(*) FROM track_social_videos WHERE action = 'uncomments'$where) AS uncomments";
        $result = $this->db->query($query);
        
        if($result->num_rows() > 0)
        {
            return $result->row();
        }else{
            return array();
        }
    }

    public function getAmmountInviteFriends($ini,$fin) 
    {
        if($ini == 'null' && $fin == 'null')
        {
            $result = $this->db->get('friend_invitation');
        }else{
            if($ini != 'null' && $fin != 'null')
            {
                $result = $this->db->where('invited_date <=',$fin)
                        ->where('invited_date >=',$ini)
                        ->get('friend_invitation');
            }else{
                if($ini == 'null')
                {
                    $result = $this->db->where('invited_date <=',$fin)->get('friend_invitation');
                }else{
                    $result = $this->db->where('invited_date >=',$ini)->get('friend_invitation');
                }
            }
        }
        
        return $result->num_rows();
    }
}

?>
