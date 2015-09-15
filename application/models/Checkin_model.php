<?php

class Checkin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function numberVisitorsCurrentWeek()
    {
        //bereken begin en einde van week
        $now = time();

        if (date('w', time()) == 1){
            $beginning_of_week = strtotime('Today',time());
        }
        else{
            $beginning_of_week = strtotime('last Monday',time());
        }

        if(date('w', time()) == 7){
            $end_of_week = strtotime('Today', $now) + 86400;
        }
        else{
            $end_of_week = strtotime('next Sunday', $now) + 86400;
        }

        $this->db->select('id, count(id)');
        $this->db->from('tbl_checkin');
        $this->db->where('site', $_SESSION['key']);
        $this->db->where('time >=', $beginning_of_week);
        $this->db->where('time <=', $end_of_week);
        $this->db->where('checkin', 1);
        return $this->db->count_all_results();
    }

    public function visitorsCurrentWeek()
    {
        //bereken begin en einde van week
        $now = time();

        if (date('w', time()) == 1){
            $beginning_of_week = strtotime('Today',time());
        }
        else{
            $beginning_of_week = strtotime('last Monday',time());
        }

        if(date('w', time()) == 7){
            $end_of_week = strtotime('Today', $now) + 86400;
        }
        else{
            $end_of_week = strtotime('next Sunday', $now) + 86400;
        }

        $this->db->select('tbl_checkin.time, tbl_visitors.name AS visitor, count(visitor) AS count, tbl_visitors.email');
        $this->db->from('tbl_checkin');
        $this->db->join('tbl_visitors', 'tbl_visitors.pkid = tbl_checkin.visitor');
        $this->db->where('tbl_checkin.site', $_SESSION['key']);
        $this->db->where('tbl_checkin.time >=', $beginning_of_week);
        $this->db->where('tbl_checkin.time <=', $end_of_week);
        $this->db->where('tbl_checkin.checkin', 1);
        $this->db->group_by("visitor");

        $query = $this->db->get();
        return $query->result();
    }

    public function visitorsLastMonth()
    {
        $this->db->select('tbl_checkin.time, tbl_visitors.name AS visitor, count(visitor) AS count, tbl_visitors.email');
        $this->db->from('tbl_checkin');
        $this->db->join('tbl_visitors', 'tbl_visitors.pkid = tbl_checkin.visitor');
        $this->db->where('tbl_checkin.site', $_SESSION['key']);
        $this->db->where('tbl_checkin.time >=', strtotime("-1 month"));
        $this->db->where('tbl_checkin.time <=', time());
        $this->db->where('tbl_checkin.checkin', 1);
        $this->db->group_by("visitor");

        $query = $this->db->get();
        return $query->result();
    }

    public function visitorsLast6Months()
    {
        $this->db->select('tbl_checkin.time, tbl_visitors.name AS visitor, count(visitor) AS count, tbl_visitors.email');
        $this->db->from('tbl_checkin');
        $this->db->join('tbl_visitors', 'tbl_visitors.pkid = tbl_checkin.visitor');
        $this->db->where('tbl_checkin.site', $_SESSION['key']);
        $this->db->where('tbl_checkin.time >=', strtotime("-6 month"));
        $this->db->where('tbl_checkin.time <=', time());
        $this->db->where('tbl_checkin.checkin', 1);
        $this->db->group_by("visitor");

        $query = $this->db->get();
        return $query->result();
    }

    public function NumberVisitorsLastMonth()
    {
        $this->db->select("count(id) as visits, DATE_FORMAT(FROM_UNIXTIME(`time`), '%Y-%m-%d') AS date");
        $this->db->from('tbl_checkin');
        $this->db->where('site', $_SESSION['key']);
        $this->db->where('time >=', strtotime("-1 month"));
        $this->db->where('time <=', time());
        $this->db->where('checkin', 1);
        $this->db->group_by("date");

        $query = $this->db->get();
        return $query->result();
    }

    public function getMailAllVisitors(){
        $this->db->select('tbl_visitors.email');
        $this->db->from('tbl_visitors');
        $this->db->join('tbl_checkin', 'tbl_visitors.pkid = tbl_checkin.visitor');
        $this->db->where('tbl_checkin.site',$_SESSION['key']);

        $query = $this->db->get();
        return $query->result();
    }

    public function getMailVisitors($option){

        if($option == 'option1'){
            $this->db->select('tbl_visitors.email');
            $this->db->from('tbl_visitors');
            $this->db->join('tbl_checkin', 'tbl_visitors.pkid = tbl_checkin.visitor');
            $this->db->where('tbl_checkin.site',$_SESSION['key']);

            $query = $this->db->get();
            return $query->result();
        }elseif($option = 'option2'){
            $this->db->select('tbl_visitors.email');
            $this->db->from('tbl_visitors');
            $this->db->join('tbl_checkin', 'tbl_visitors.pkid = tbl_checkin.visitor');
            $this->db->where('tbl_checkin.time >', strtotime("-6 month") );
            $this->db->where('tbl_checkin.site',$_SESSION['key']);

            $query = $this->db->get();
            return $query->result();
        }elseif($option = 'option3'){
            $this->db->select('tbl_visitors.email');
            $this->db->from('tbl_visitors');
            $this->db->join('tbl_checkin', 'tbl_visitors.pkid = tbl_checkin.visitor');
            $this->db->where('tbl_checkin.time >', strtotime("-3 month") );
            $this->db->where('tbl_checkin.site',$_SESSION['key']);

            $query = $this->db->get();
            return $query->result();
        }else{
            $this->db->select('tbl_visitors.email');
            $this->db->from('tbl_visitors');
            $this->db->join('tbl_checkin', 'tbl_visitors.pkid = tbl_checkin.visitor');
            $this->db->where('tbl_checkin.time >', strtotime("-1 month") );
            $this->db->where('tbl_checkin.site',$_SESSION['key']);

            $query = $this->db->get();
            return $query->result();
        }

    }
}