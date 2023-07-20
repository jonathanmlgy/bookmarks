<?php
class Bookmark extends CI_Model {
    function add_bookmark($bookmark)
    {
        $query = "INSERT INTO bookmarks(folder, name, url, created_at, updated_at) VALUES (?,?,?,?,?)";
        $values = array($bookmark['folder'], $bookmark['name'], $bookmark['url'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")); 
        return $this->db->query($query, $values);
    }

    function get_bookmark_by_id($bookmark_id)
    {
        return $this->db->query("SELECT folder, name, url FROM Bookmarks WHERE id = ?", array($bookmark_id))->row_array();
    }

    function delete_by_id($delete_id)
    {
        return $this->db->query("DELETE FROM Bookmarks WHERE id = ?", array($delete_id));
    }

    function get_all_bookmarks()
    {
        return $this->db->query("SELECT id, folder, name, url FROM Bookmarks")->result_array();
    }
}
?>