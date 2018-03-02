<?php
declare(strict_types = 1);

namespace MultiplicationTable;

class MultiplicationTable
{
    private $rows;
    private $columns;

    /**
     * Set which multiplication table and how many rows/columns to generate.
     * @param int $rows
     * @param int $columns
     */
    public function __construct(int $rows = 10, int $columns = 10)
    {
        $this->rows = $rows;
        $this->columns = $columns;
    }

    /**
     * Create and return a html table.
     * @return string $table
     */
    public function html() : string
    {
        $table = "<table class=\"multiplicationTable\">";

        for ($row = 1; $row <= $this->rows + 1; $row++) {
            $table .= "<tr>";

            for ($column = 1; $column <= $this->columns + 1; $column++) {
                if ($row == 1 && $column == 1) {
                    $table .= "<td class=\"bold highlighted\">X</td>";
                } elseif ($row == 1) {
                    $table .= "<td class=\"bold highlighted\">" . ($column - 1) . "</td>";
                } elseif ($column == 1) {
                    $table .= "<td class=\"bold highlighted\">" . ($row - 1) . "</td>";
                } else {
                    $table .= "<td>" . ($row - 1) * ($column - 1) . "</td>";
                }
            }

            $table .= "</tr>";
        }

        $table .= "</table>";

        return $table;
    }

    /**
     * Create and return a table suitable for CLI output.
     * @return string $table
     */
    public function cli() : string
    {
        $table = "";
        $largestNumber = $this->rows * $this->columns;
        $largestNumberLength = strlen("" . $largestNumber);
        $spacingPrefab = "";

        for ($s = 0; $s < $largestNumberLength + 1; $s++) {
            $spacingPrefab .= " ";
        }

        for ($row = 1; $row <= $this->rows + 1; $row++) {
            for ($column = 1; $column <= $this->columns + 1; $column++) {
                $currentChars = "";
                $currentCharsColorized = "";

                if ($row == 1 && $column == 1) {
                    $currentChars = "X";
                    $currentCharsColorized = "\033[1;37;44m" . "X" . "\033[0m";
                } elseif ($row == 1) {
                    $currentChars = "" . ($column - 1) . "";
                    $currentCharsColorized = "\033[1;37;44m" . ($column - 1) . "\033[0m";
                } elseif ($column == 1) {
                    $currentChars = "" . ($row - 1) . "";
                    $currentCharsColorized = "\033[1;37;44m" . ($row - 1) . "\033[0m";
                } else {
                    $currentChars = "" . ($row - 1) * ($column - 1) . "";
                    $currentCharsColorized = "" . ($row - 1) * ($column - 1) . "";
                }

                $spacing = substr($spacingPrefab, 0, strlen($spacingPrefab) - strlen($currentChars));

                $table .= $currentCharsColorized . $spacing;
            }

            $table .= "\r\n";
        }

        return $table;
    }
}