<?php

namespace Models;

class WorkModel extends Model {

    public function create($name, $email, $text, $status = 0) {
        
        $status = $status ? 1 : 0;

        $sql = "INSERT INTO works (`name`, `email`, `text`, `status`) VALUES ('$name', '$email', '$text', $status)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $this->db->lastInsertId();
    }
    
    public function edit($id, $params) {

        $sql_fileds = [];

        if (!empty($params)) foreach ($params as $name => $value) {

            if ($name == 'status') $value = $value ? 1 : 0;
            
            $sql_fileds[] = "`$name` = '$value'";
            
        } else return false;

        $sql_fileds_str = implode(', ', $sql_fileds);
        
        $sql = "UPDATE works SET $sql_fileds_str WHERE id = '$id'";
        
        $stmt = $this->db->prepare($sql);

        return $stmt->execute();
    }

    public function findAllWorks($start, $count_per_page, $sort = '') {

        $sort_list = array(
            'name_asc'   => '`name`',
            'name_desc'  => '`name` DESC',
            'email_asc'  => '`email`',
            'email_desc' => '`email` DESC',
            'date_asc'  => '`created`',
            'date_desc' => '`created` DESC'
        );

        $order = '';

        if ($sort && isset($sort_list[$sort])) $order = "ORDER BY {$sort_list[$sort]}";

        $sql = "SELECT `id`, `name`, `email`, `text`, `status`, `is_edit`, `created` FROM `works` $order LIMIT $start, $count_per_page";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = [];
        
        if ($items = $stmt->fetchAll()) foreach ($items as $item) {
            $result[] = [
                'id' => intval($item['id']), 
                'name' => $item['name'], 
                'email' => $item['email'], 
                'text' => $item['text'], 
                'status' => intval($item['status']), 
                'created' => $item['created'],
                'is_edit' => $item['is_edit'],
                'created_at' => date("d.m.Y", strtotime($item['created']))
            ];
        }

        return [
            'items' => $result,
            'count' => $this->fetchColumn("SELECT COUNT(*) FROM `works`")
        ];

    }

    public function findWorkByID($id) {

        $sql = "SELECT `id`, `name`, `email`, `text`, `status`, `is_edit`, `created` FROM `works` WHERE `id` = '$id'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $item = $stmt->fetch();

        if (!empty($item)) {

            return [
                'id' => intval($item['id']), 
                'name' => $item['name'], 
                'email' => $item['email'], 
                'text' => $item['text'], 
                'status' => intval($item['status']), 
                'is_edit' => $item['is_edit'],
                'updated' => $item['updated'],
                'created_at' => date("d.m.Y", strtotime($item['created']))
            ];

        } else return false;

    }

    public function fetchColumn($sql) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

}