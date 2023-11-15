<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter {
    protected $safeParams = [];

    /**
     * The map to convert JSON field name to DB column name.
     */
    protected $columnMap = [];

    protected $operatorMap = [];

    public function transform(Request $request) : array {
        $eloQuery = [];

        foreach ($this->safeParams as $param => $operators) {
            $query = $request->query($param);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$param] ?? $param;

            foreach ($operators as $operator) {
                if (!isset($query[$operator])) {
                    continue;
                }
                $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
            }
        }

        return $eloQuery;
    }
}