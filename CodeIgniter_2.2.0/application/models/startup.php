<?php


/*
CREATE TABLE IF NOT EXISTS `startup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(150) NOT NULL,
  `follower_count` int(11) NOT NULL,
  `location` varchar(150) NOT NULL,
  `first_activity_date` text NOT NULL,
  `incubated` tinyint(1) NOT NULL,
  `first_incubated_date` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at_api` text NOT NULL,
  `updated_at_api` text NOT NULL,
  `vc_incubator` tinyint(1) NOT NULL,
  `some_error` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_company` (`id_company`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
*/
class Startup extends CI_Model {

    public static $dbName = 'startup'; 

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function get_last_ten_entries()
    {
        $query = $this->db->get(self::$dbName, 10);
        return $query->result();
    }

    public function get_first_result(){
        $query = $this->db->query('SELECT * FROM startup as s 
                JOIN activity as a on a.id_startup = s.id
                GROUP BY follower_count
                ORDER BY follower_count'
                );
        return $query->result();
    }

    public function get_second_result(){
        $query = $this->db->query('SELECT * FROM startup as s 
                JOIN activity as a on a.id_startup = s.id
                GROUP BY follower_count
                ORDER BY follower_count'
                );
        return $query->result();
    }



    // function insert_entry()
    // {
    //     $this->title   = $_POST['title']; // please read the below note
    //     $this->content = $_POST['content'];
    //     $this->date    = time();

    //     $this->db->insert('entries', $this);
    // }

    // function update_entry()
    // {
    //     $this->title   = $_POST['title'];
    //     $this->content = $_POST['content'];
    //     $this->date    = time();

    //     $this->db->update('entries', $this, array('id' => $_POST['id']));
    // }

}
