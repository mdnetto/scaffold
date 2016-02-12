<?php

namespace Company\Mappers;

class EmployeeMapper extends BaseMapper {

    protected function getModelClass() {
        return '\Company\Models\EmployeeModel';
    }

    protected function getTableName() {
        return 'employees';
    }

    public function find($id) {
        $statement = $this->pdo->prepare("SELECT * FROM {$this->getTableName()} WHERE emp_no=?");
        $statement->execute([$id]);
        $result = $statement->fetch();
        return $this->hydrateModel($result);
    }
}
