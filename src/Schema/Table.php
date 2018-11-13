<?php

namespace Karamel\DB\Schema;

/**
 * Class Table
 * @package Karamel\DB\Schema
 * @method Table string($name, $lengh = 255)
 * @method Table integer($name, $auto_increamet = false, $unsinged = false)
 * @method Table tinyInteger($name, $auto_increamet = false, $unsinged = false)
 * @method Table text($name)
 * @method Table mediumText($name)
 * @method Table enum($name, $options = [])
 * @method Table index()
 * @method Table default($default)
 * @method Table increments($name)
 * @method Table nullable()
 * @method Table foreign($columnName)
 * @method Table references($refereces)
 * @method Table on($tableName)
 */
class Table
{
    public $sqlQuery;
    public $indexColumns;
    private $lastColumn;

    public function __construct()
    {
        $this->indexColumns = [];
    }

    private function _string($name, $length = 255)
    {
        $this->sqlQuery .= '`' . $name . '` VARCHAR(' . $length . ') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
        $this->lastColumn = $name;
    }

    private function _integer($name, $auto_increamet = false, $unsinged = false)
    {
        $this->sqlQuery .= '`' . $name . '` INT(10)';
        $this->lastColumn = $name;
    }

    private function _tinyInteger($name, $auto_increamet = false, $unsinged = false)
    {

    }

    private function _text($name)
    {

    }

    private function _mediumText($name)
    {

    }

    private function _enum($name, $options = [])
    {

    }

    private function _date($name)
    {

    }

    private function _timestamp($name)
    {

    }

    private function _index()
    {
        $this->indexColumns[] = $this->lastColumn;
    }

    private function _default($default)
    {

    }

    private function _increments($name)
    {

    }

    private function _nullable()
    {

    }

    private function _foreign($columnName)
    {

    }

    private function _references($refereces)
    {

    }

    private function _on($tableName)
    {

    }

    private function _onUpdate($action)
    {

    }

    private function _onDelete($action)
    {


    }

    public function __call($name, $arguments)
    {
        $this->_{$name}(...$arguments);
    }

    public function generateIndexedColumns()
    {
        foreach ($this->indexColumns as $index => $indexColumn) {
            $this->indexColumns[$index] = 'INDEX (`' . $indexColumn . '`)';
        }
        return implode(",", $this->indexColumns);
    }

    public static function create($tableName, $tableColumns)
    {
        $table = new Table();
        $table->sqlQuery = 'CREATE TABLE `' . $tableName . '` (';
        $table->tableName = $table;
        $tableColumns($table);
        $table->sqlQuery .= $table->generateIndexedColumns();
        $table->sqlQuery .= ')';
        return $table->sqlQuery;
    }
}