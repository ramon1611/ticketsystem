<?php
/**
 *  @Author: Ramon Rosin 
 *  @File: sqlquery.class.php
 *  @Date: 2017-12-19 15:20:05 
 * @Last Modified by: Ramon Rosin
 * @Last Modified time: 2017-12-20 08:33:11
 */

class SQLQuery {
    public function __construct( ) {}
    
    public function select( $table, array $columns, $end = true, $distinct = false ) {
        if ( isset( $table, $columns, $end, $distinct ) ) {
            $lastCol = array_pop( $columns );
            $cols = NULL;

            foreach ($columns as $column)
                $cols .= $column.', ';
            $cols .= $lastCol.' ';
            
            $query = 'SELECT '.( $distinct ? 'DISTINCT ' : '' ).$cols.'FROM '.$table.( $end ? ';' : '' );
            return $query;
        } else
            return false;
    }

    public function where( $condition, $end = true ) {
        if ( isset( $condition, $end ) ) {
            $query = 'WHERE '.$condition.( $end ? ';' : '' );
            return $query;
        } else
            return false;
    }

    public function order( array $columns, $order = 'ASC', $end = true ) {
        if ( isset( $columns, $order, $end ) ) {
            $lastCol = array_pop( $columns );
            $cols = NULL;

            foreach ($columns as $column)
                $cols .= $column.', ';
            $cols .= $lastCol;
            
            $query = 'ORDER BY '.$cols.( $end ? ';' : '' );
            return $query;
        } else
            return false;
    }

    public function insert( $table, array $columns, array $values, $end = true ) {
        if ( isset( $table, $columns, $values, $end ) ) {
            $lastCol = array_pop( $columns );
            $lastVal = array_pop( $values );
            $cols = NULL;
            $vals = NULL;
            
            foreach ($columns as $column)
                $cols .= $column.', ';
            $cols .= $lastCol.' ';
            
            foreach ($values as $value)
                $vals .= '\''.$value.'\', ';
            $vals .= $lastVal.' ';
            
            $query = 'INSERT INTO '.$table.' ('.$cols.') VALUES ('.$vals.')'.( $end ? ';' : '' );
            return $query;
        } else
            return false;
    }

    public function update( $table, array $valuePairs, $condition, $end = true ) {
        if ( isset( $table, $valuePairs, $condition, $end ) ) {
            $lastPair = $this->array_pop_assoc( $valuePairs );
            $valPairs = NULL;

            foreach ($valuePairs as $column => $value)
                $valPairs .= $column.'=\''.$value.'\', ';
            $valPairs .= key($lastPair).'=\''.current($lastPair).'\' ';

            $query = 'UPDATE '.$table.' SET '.$valPairs.$this->where( $condition, $end );
            return $query;
        } else
            return false;
    }

    public function delete( $table, $condition, $end = true ) {
        if ( isset( $table, $condition, $end ) ) {
            $query = 'DELETE FROM '.$table.' '.$this->where( $condition, $end );
            return $query;
        } else
            return false;
    }


    private function array_pop_assoc( &$arr ) {
        $value = end($arr);
        $key = key($arr);
        unset($arr[$key]);

        return array( $key => $value );
    }
}
?>