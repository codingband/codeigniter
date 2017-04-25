<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistics extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->layout->set_layout('admin/layouts/default');
        $this->load->library('auth');
        $this->auth->logged_in();
        $this->auth->is_admin();
        $this->load->library('admin_statistics');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index()
    {
        $this->listar();
    }

    public function listar($ini = 'null', $fin = 'null')
    {
        $data['nav_main'] = 4;
        $ammount_users = $this->admin_statistics->getAmmountUsers($ini,$fin);
        $ammount_tips = $this->admin_statistics->getAmmountTips($ini,$fin);
        $ammounts_tips = $this->admin_statistics->getAmmountsSocialTips($ini,$fin);
        $ammounts_videos = $this->admin_statistics->getAmmountsSocialVideos($ini,$fin);
        $ammount_invite_friends = $this->admin_statistics->getAmmountInviteFriends($ini,$fin);
        $data['ammount_users'] = $ammount_users;
        $data['ammount_tips'] = $ammount_tips;

        if(!empty($ammounts_tips))
        {
            $data['ammount_likes_tips'] = $ammounts_tips->likes;
            $data['ammount_unlikes_tips'] = $ammounts_tips->unlikes;
            $data['ammount_comments_tips'] = $ammounts_tips->comments;
            $data['ammount_uncomments_tips'] = $ammounts_tips->uncomments;
            $data['ammount_tweets_tips'] = $ammounts_tips->tweets;
            $data['ammount_retweets_tips'] = $ammounts_tips->retweets;
        }else{
            $data['ammount_likes_tips'] = 0;
            $data['ammount_unlikes_tips'] = 0;
            $data['ammount_comments_tips'] = 0;
            $data['ammount_uncomments_tips'] = 0;
            $data['ammount_tweets_tips'] = 0;
            $data['ammount_retweets_tips'] = 0;
        }

        if(!empty($ammounts_tips))
        {
            $data['ammount_likes_video'] = $ammounts_videos->likes;
            $data['ammount_unlikes_video'] = $ammounts_videos->unlikes;
            $data['ammount_comments_video'] = $ammounts_videos->comments;
            $data['ammount_uncomments_video'] = $ammounts_videos->uncomments;
            $data['ammount_tweets_video'] = $ammounts_videos->tweets;
            $data['ammount_retweets_video'] = $ammounts_videos->retweets;
        }else{
            $data['ammount_likes_video'] = 0;
            $data['ammount_unlikes_video'] = 0;
            $data['ammount_comments_video'] = 0;
            $data['ammount_uncomments_video'] = 0;
            $data['ammount_tweets_video'] = 0;
            $data['ammount_retweets_video'] = 0;
        }

        $data['ammount_invite_friends'] = $ammount_invite_friends;
        $data['desde'] = ($ini != 'null')?$ini:'';
        $data['hasta'] = ($fin != 'null')?$fin:'';
        $this->layout->view('admin/statistics_view',$data);
    }

    public function export_xls($ini = 'null', $fin = 'null')
    {
        $data['nav_main'] = 1;
        $data['title'] = 'ESTAD&Iacute;STICAS';
        $data['filename']='statistics.xls';
        $data['desde']=$ini;
        $data['hasta']=$fin;

        $ammount_users = $this->admin_statistics->getAmmountUsers($ini,$fin);
        $ammount_tips = $this->admin_statistics->getAmmountTips($ini,$fin);
        $ammounts_tips = $this->admin_statistics->getAmmountsSocialTips($ini,$fin);
        $ammounts_videos = $this->admin_statistics->getAmmountsSocialVideos($ini,$fin);
        $ammount_invite_friends = $this->admin_statistics->getAmmountInviteFriends($ini,$fin);
        $data['ammount_users'] = $ammount_users;
        $data['ammount_tips'] = $ammount_tips;
        $data['ammount_invite_friends'] = $ammount_invite_friends;

        if(!empty($ammounts_tips))
        {
            $data['ammount_likes_tips'] = $ammounts_tips->likes;
            $data['ammount_unlikes_tips'] = $ammounts_tips->unlikes;
            $data['ammount_comments_tips'] = $ammounts_tips->comments;
            $data['ammount_uncomments_tips'] = $ammounts_tips->uncomments;
            $data['ammount_tweets_tips'] = $ammounts_tips->tweets;
            $data['ammount_retweets_tips'] = $ammounts_tips->retweets;
        }else{
            $data['ammount_likes_tips'] = 0;
            $data['ammount_unlikes_tips'] = 0;
            $data['ammount_comments_tips'] = 0;
            $data['ammount_uncomments_tips'] = 0;
            $data['ammount_tweets_tips'] = 0;
            $data['ammount_retweets_tips'] = 0;
        }

        if(!empty($ammounts_tips))
        {
            $data['ammount_likes_video'] = $ammounts_videos->likes;
            $data['ammount_unlikes_video'] = $ammounts_videos->unlikes;
            $data['ammount_comments_video'] = $ammounts_videos->comments;
            $data['ammount_uncomments_video'] = $ammounts_videos->uncomments;
            $data['ammount_tweets_video'] = $ammounts_videos->tweets;
            $data['ammount_retweets_video'] = $ammounts_videos->retweets;
        }else{
            $data['ammount_likes_video'] = 0;
            $data['ammount_unlikes_video'] = 0;
            $data['ammount_comments_video'] = 0;
            $data['ammount_uncomments_video'] = 0;
            $data['ammount_tweets_video'] = 0;
            $data['ammount_retweets_video'] = 0;
        }
        
        $this->load->view('admin/statistics_xls', $data);
    }
}
/* Location: ./application/controllers/admin/statistics.php */