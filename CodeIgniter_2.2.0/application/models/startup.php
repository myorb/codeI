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

    public function get_first_result($do = null){
        // $query = $this->db->query('SELECT * FROM startup as s 
        //         JOIN activity as a on a.id_startup = s.id
        //         GROUP BY follower_count
        //         ORDER BY follower_count'
        //         );

        $query = $this->db->query("SELECT s.url, s.first_incubated_date, s.name, s.follower_count
                FROM startup AS s
                LEFT JOIN activity AS a ON s.id = a.id_startup
                WHERE a.type_author =  'Startup'
                UNION 
                SELECT s.url, s.first_incubated_date, s.name, p.follower_count
                FROM person AS p
                LEFT JOIN activity AS a ON p.id_user = a.id_author
                LEFT JOIN startup AS s ON p.id_user = s.id
                WHERE a.type_author =  'User'
                ORDER BY 4 DESC "
        );

        if($do === null)
            return $query->result();
        else
            return $query;
    }

    public function get_table_formated_first_result(){
        $query = $this->get_first_result('not exeqte query');
        //set table header
        $this->table->set_heading('         Ссылка        ','Дата инкубации','    Имя инкубатора   ', 'Количество фоловеров');
        //add stylesheet
        $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">' );
        $this->table->set_template($tmpl);
        
        return $this->table->generate($query);

    }

    // public function get_second_result(){
    //     $query = $this->db->query('SELECT * FROM startup as s 
    //             JOIN activity as a on a.id_startup = s.id
    //             JOIN person as p on p.id_startup = s.id
    //             GROUP BY follower_count
    //             ORDER BY follower_count'
    //             );
    //     return $query->result();
    // }
    public function get_second_result(){
        $query = $this->db->query('SELECT s.name, s.created_at, s.follower_count, s.url FROM startup as s 
                JOIN activity as a on a.id_startup = s.id
                JOIN person as p on p.id_user = a.id_author'
                );
        return $query->result();
    }

    public function get_table_formated_second_result(){
        
        $query = $this->db->query("SELECT s.url,s.created_at_api, SUM(p.follower_count) as followers FROM startup as s 
                JOIN activity as a ON s.id = a.id_startup
                JOIN person as p ON p.id_user = a.id_author
                WHERE a.type_author = 'User'
                GROUP BY s.id
                ORDER BY s.created_at_api"
                );
        
        //set table header
        $this->table->set_heading('ссылка', 'дата создания', ' количество фоловеров');
        // $this->table->set_heading('         Ссылка        ','Дата инкубации','    Имя инкубатора   ', 'Количество фоловеров');
        //add stylesheet
        $tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">' );
        $this->table->set_template($tmpl);
        
        // //bilding table
        // foreach ($query->result() as $key => $value) {
        //   $this->table->add_row($value->url, $value->created_at, $value->name,$value->follower_count);
        //   # code...
        // }
        
        return $this->table->generate($query);
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
