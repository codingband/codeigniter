<?php
$config = array(
                 'signup' => array(
                                    array(
                                            'field' => 'first_name',
                                            'label' => 'lang:label_first_name',
                                            'rules' => 'required|min_length[2]|max_length[20]'
                                         ),
                                    array(
                                            'field' => 'last_name',
                                            'label' => 'lang:label_last_name',
                                            'rules' => 'required|min_length[2]|max_length[20]'
                                         ),
                                    array(
                                            'field' => 'phone',
                                            'label' => 'lang:label_phone',
                                            'rules' => 'required|min_length[3]|max_length[20]'
                                         ),
                                    array(
                                            'field' => 'enterprise',
                                            'label' => 'lang:label_enterprise',
                                            'rules' => 'required|min_length[2]|max_length[100]'
                                         ),
                                    array(
                                            'field' => 'country',
                                            'label' => 'lang:label_country',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'lang:label_email',
                                            'rules' => 'required|min_length[8]|max_length[50]|valid_email|callback_email_notfound'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'lang:label_password',
                                            'rules' => 'required|min_length[6]|max_length[20]|matches[passconf]'
                                         ),
                                    array(
                                            'field' => 'passconf',
                                            'label' => 'lang:label_passconf',
                                            'rules' => 'required|min_length[6]|max_length[20]'
                                         )
                                    ),                        
                 'user_edit' => array(
                                    array(
                                            'field' => 'first_name',
                                            'label' => 'lang:label_first_name',
                                            'rules' => 'required|min_length[2]|max_length[20]'
                                         ),
                                    array(
                                            'field' => 'last_name',
                                            'label' => 'lang:label_last_name',
                                            'rules' => 'required|min_length[2]|max_length[20]'
                                         ),
                                    array(
                                            'field' => 'phone',
                                            'label' => 'lang:label_phone',
                                            'rules' => 'required|min_length[3]|max_length[20]'
                                         ),
                                    array(
                                            'field' => 'enterprise',
                                            'label' => 'lang:label_enterprise',
                                            'rules' => 'required|min_length[2]|max_length[100]'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'lang:label_email',
                                            'rules' => 'required|min_length[8]|max_length[50]|valid_email|callback_email_notfound2'
                                         )
                                    ),
                             
                                                                
                 'contact' => array(
                                    array(
                                            'field' => 'full_name',
                                            'label' => 'lang:label_full_name',
                                            'rules' => 'required|min_length[2]|max_length[40]'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'lang:label_email',
                                            'rules' => 'required|min_length[8]|max_length[50]|valid_email|callback_email_notfound'
                                         ),
                                    array(
                                            'field' => 'phone',
                                            'label' => 'lang:label_phone',
                                            'rules' => 'required|min_length[3]|max_length[20]'
                                         ),
                                    array(
                                            'field' => 'enterprise',
                                            'label' => 'lang:label_enterprise',
                                            'rules' => 'required|min_length[2]|max_length[100]'
                                         ),
                                    array(
                                            'field' => 'website',
                                            'label' => 'lang:label_website',
                                            'rules' => 'required|min_length[5]|max_length[255]'
                                         ),
                                    array(
                                            'field' => 'country',
                                            'label' => 'lang:label_country',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'subject',
                                            'label' => 'lang:label_subject',
                                            'rules' => 'required'
                                         )
                       
                                    ),                        
               );
/* End of file form_validation.php */