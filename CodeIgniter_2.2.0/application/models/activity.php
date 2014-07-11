<?php
/*
CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_activity` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `type_author` varchar(30) NOT NULL,
  `type_id` int(11) NOT NULL,
  `id_startup` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_activity` (`id_activity`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
*/
class Activity extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    public static $dbName = 'activity'; 


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get(self::$dbName, 10);

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
