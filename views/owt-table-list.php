<?php

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class OWTTableList extends WP_List_Table {

    var $data = array(
        array("id" => 1, "name" => "Sanjay", "email" => "sanjay@gmail.com"),
        array("id" => 2, "name" => "Aman", "email" => "aman@gmail.com"),
        array("id" => 3, "name" => "Rohit", "email" => "rohit@gmail.com"),
        array("id" => 4, "name" => "Gopal", "email" => "gopal@gmail.com")
    );

    public function prepare_items() {

        $this->items = $this->data;

        $columns = $this->get_columns();

        $this->_column_headers = array($columns);
    }

    public function get_columns() {

        $columns = array(
            "id" => "ID",
            "name" => "Name",
            "email" => "Email"
        );

        return $columns;
    }

    public function column_default($item, $column_name) {

        switch ($column_name) {

            case 'id':
            case 'name':
            case 'email':
                return $item[$column_name];
            default:
                return "no value";
        }
    }

}

function owt_show_data_list_table() {

    $owt_table = new OWTTableList();

    $owt_table->prepare_items();
    echo '<h3>This is List</h3>';
    $owt_table->display();
}

owt_show_data_list_table();
