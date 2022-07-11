<?php

require_once('db.php');

class buku
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(HOST, USER, PASS, DB);
        if ($this->db->connect_error) {
            die("Koneksi Gagal");
        }
    }

    public function read()
    {
        $order = isset($_GET['order']) ? $_GET['order'] : 'judul_buku';
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'ASC';
        $begin = isset($_GET['begin']) ? $_GET['begin'] : 0;
        
        if($_GET['genre'] != null) {
            $genre = $_GET['genre'];
            $sql = "SELECT * FROM buku where genre = '$genre' order by $order $sort limit $begin,8";
        } else {
            $sql = "SELECT * FROM buku order by $order $sort limit $begin,8";
        }

        $result = $this->db->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            array_push($data,$row);
        }
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function create($data)
    {
        foreach ($data as $key => $value) {
            $value = trim(is_array($value) ? implode(',', $value) : $value);
            $data[$key] = strlen($value) > 0 ? $value : NULL;
        }
        // sementara
        $data['cover'] = '';
        //
        $query = "INSERT INTO buku VALUES(NULL, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $this->db->prepare($query);
        $sql->bind_param(
            'sissiis',
            $data['judul_buku'],
            $data['penulis'],
            $data['harga'],
            $data['sinopsis'],
            $data['genre'],
            $data['penerbit'],
            $data['cover'],
        );

        try {
            $sql->execute();
        } catch (\Exception $e) {
            $sql->close();
            http_response_code(500);
            die($e->getMessage());
        }
        $id_buku = $sql->insert_id;
        $sql->close();
        return $id_buku;
    }

    public function update($data)
    {
        foreach ($data as $key => $value) {
            $value = trim(is_array($value) ? implode(',', $value) : $value);
            $data[$key] = strlen($value) > 0 ? $value : NULL;
        }

        // sementara
        $data['cover'] = '';
        //

        $id = intval($data['id_buku']);
        $query = "UPDATE buku set judul_buku = ?, id_penulis = ?, harga = ?, sinopsis = ?, id_genre = ?, id_penerbit = ?, cover = ? WHERE id_buku = $id";
        $sql = $this->db->prepare($query);
        $sql->bind_param(
            'sissiis',
            $data['judul_buku'],
            $data['penulis'],
            $data['harga'],
            $data['sinopsis'],
            $data['genre'],
            $data['penerbit'],
            $data['cover'],
        );

        try {
            $sql->execute();
        } catch (\Exception $e) {
            $sql->close();
            http_response_code(500);
            die($e->getMessage());
        }
        $sql->close();
        return $id;
    }

    function edit($id)
    {
        $result = $this->db->query('SELECT * FROM buku WHERE id_buku = ' . intval($id));
        $data = [];
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
        header("Content-Type: application/json");
        echo json_encode($data);
    }
}

$buku = new buku();

switch ($_GET['action']) {
    case 'create':
        $id = $buku->create($_POST);
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], __DIR__ . "/../assets/{$id}.jpg");
        break;

    case 'update':
        $id = $buku->update($_POST);
        if ($_FILES['thumbnail']) {
            unlink(__DIR__ . "/../assets/{$id}.jpg");
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], __DIR__ . "/../assets/{$id}.jpg");
        }
        break;

    case 'edit':
        $buku->edit($_GET['id']);
        break;

    default:
        $buku->read();
        break;
}
