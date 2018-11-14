<?php

/**
 * This class handles all database interaction.
 */

class QueryBuilder
{
    /**
     * The instance variable that contains the PDO connection.
     * This is passed in on instantiation.
     *
     * @var PDO
     */
    protected $db;

    /**
     * Constructs the class.
     *
     * @param PDO $db
     */
    public function __construct($db)
    {
        // Stores the passed variable against the class.
        $this->db = $db;
    }

    /**
     * Selects all rows from a specified table.
     *
     * @param string $table
     * @return array
     */
    public function selectAll($table)
    {
        $query = $this->db->prepare("SELECT * FROM {$table}");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Selects one row from a specified table by ID.
     *
     * @param string $table
     * @param int $id
     * @return stdClass
     */
    public function select($table, $id)
    {
        $query = $this->db->prepare("SELECT * FROM {$table} WHERE id = :id");
        $query->execute(['id' => $id]);
        return $query->fetchObject();
    }

    /**
     * Adds an entry to the database
     *
     * @param string $firstName
     * @param array $lastName
     * @return void
     */
    public function insert($table, $values)
    {
        // We get the keys of the values array
        $keys = array_keys($values);

        // Join them with commas for the columns
        $columns = implode(', ', $keys);

        // Map them so they have a : before them and
        // then implode them with commas for the placeholders.
        $placeholders = implode(', ', array_map(function ($key) {
            return ":$key";
        }, $keys));

        try {
            // Build the query
            $query = $this->db->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");

            // Fire the query
            $query->execute($values);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Deletes an entry from the specified table by ID.
     *
     * @param string $table
     * @param int $id
     * @return void
     */
    public function delete($table, $id)
    {
        try {
            $query = $this->db->prepare("DELETE FROM {$table} WHERE id = :id");
            $query->execute([
                'id' => $id,
            ]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    /**
     * Updates a row on the specified table by ID.
     *
     * @param string $table
     * @param int $id
     * @param array $updates
     * @return void
     */
    public function update($table, $id, $updates)
    {
        // Get the keys
        $keys = array_keys($updates);

        // Build the string of sets
        $sets = array_map(function ($item) {
            return "$item = :$item";
        }, $keys);

        // Implode the updates with commas
        $sets = implode(', ', $sets);

        try {
            // Build the query
            $query = $this->db->prepare("UPDATE $table SET $sets WHERE id = :id");

            // Add the id to the binds
            $updates['id'] = $id;

            // Fire the query
            $query->execute($updates);

            return true;
        }catch (Exception $e){
            return false;
        }
    }

    public function order($table, $column)
    {
        try {
            // I can't remember what the problem is,,,?
            // Nothing is changing, is it cause the selectall function is bein called everytime we go to index?
            $query = $this->db->prepare("SELECT * FROM {$table} ORDER BY {$column} ASC");

            // You need to return these results
            $query->execute();

            return $query->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
            return false;
        }
    }
}

//oh shit yheeeeeee
// try now
// okey bossmang
// we are back to 0 errors but also 0 functionallity :D AHAHAHAH >:()
// my work here is done, jake out

// lmao in order controller do a var_dump of $persons, see what the fuck it is
