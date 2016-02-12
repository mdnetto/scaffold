<?php

namespace Company\Mappers;

class DepartmentMapper extends BaseMapper {

    protected function getModelClass() {
      return '\Company\Models\DepartmentModel';
    }

    protected function getTableName() {
      return'departments';
    }

    public function find($id) {
        $statement = $this->pdo->prepare("SELECT * FROM {$this->getTableName()} WHERE dept_no=?");
        $statement->execute([$id]);
        $result = $statement->fetch();
        return $this->hydrateModel($result);
    }
}
