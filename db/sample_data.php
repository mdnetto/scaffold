<?php
require __DIR__ . '/../vendor/autoload.php';

use \Scaffold\Models\FilmModel;
use \Scaffold\Models\StoreModel;

use \Scaffold\Mappers\FilmMapper;
use \Scaffold\Mappers\StoreMapper;

dataFillFilms();
dataFillStore(10);

function dataFillEmployees($x) {
  $i = 0;
  while ($i < $x) {
    $employee = new EmployeeModel();
    $employee_mapper = new EmployeeMapper();
    $first_names = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
    $last_names =  array("Bline", "Harper", "Miller", "Banks", "Smith");
    $genders = array("M", "F");
    $birth_date = mt_rand(0,  1262055681);
    $hire_date = mt_rand(1167609600, time());
    $employee->hydrate([
        "birth_date" => date("Y-m-d", $birth_date),
        "first_name" => $first_names[array_rand($first_names, 1)],
        "last_name" => $last_names[array_rand($last_names, 1)],
        "gender" => $genders[array_rand($genders, 1)],
        "hire_date" => date("Y-m-d", $hire_date)
    ]);
    $employee_mapper->create($employee);
    $i++;
  }
}

function dataFillDepartments() {
  $departments = ["Engineering", "Recruiting", "Support", "Design", "Product"];
  foreach  ($departments as $dept) {
    $department = new DepartmentModel();
    $department_mapper = new DepartmentMapper();
    $department->hydrate(["dept_name" => $dept]);
    $department_mapper->create($department);
  }
}

function dataFillDeptEmp($x) {
  $i = 1;
  while ($i <= $x) {
    $dept_emp = new DeptEmpModel();
    $dept_emp_mapper = new DeptEmpMapper();
    $from_date = mt_rand(1167609600, time());
    $dept_emp->hydrate([
        "emp_no" => $i,
        "dept_no" => mt_rand(1, 5),
        "from_date" => date("Y-m-d", $from_date),
        "to_date" => date("Y-m-d", time())
    ]);
    $dept_emp_mapper ->create($dept_emp);
    $i++;
  }
}

function dataFillDeptManager($x) {
$i = 1;
  while ($i < $x) {
    $dept_manager = new DeptManagerModel();
    $dept_manager_mapper = new DeptManagerMapper();
    $from_date = mt_rand(1167609600, time());
    $dept_manager->hydrate([
        "dept_no" => $i,
        "emp_no" => mt_rand(1, 10),
        "from_date" => date("Y-m-d", $from_date),
        "to_date" => date("Y-m-d", time())
    ]);
    $dept_manager_mapper ->create($dept_manager);
    $i++;
  }
}

function dataFillSalaries($x) {
  $i = 1;
  while ($i <= $x) {
    $salaries = new SalariesModel();
    $salaries_mapper = new SalariesMapper();
    $from_date = mt_rand(1167609600, time());
    $salaries->hydrate([
        "emp_no" => $i,
        "salary" => mt_rand(40000, 200000),
        "from_date" => date("Y-m-d", $from_date),
        "to_date" => date("Y-m-d", time())
    ]);
    $salaries_mapper ->create($salaries);
    $i++;
  }
}

function dataFillTitles($x) {
  $i = 1;
  while ($i <= $x) {
    $titles= new TitlesModel();
    $titles_mapper = new TitlesMapper();
    $from_date = mt_rand(1167609600, time());
    $first_title = array("Recruiting", "Graphic", "Creative", "Sofware", "Product", "Engineering");
    $second_title =  array("Thought Leader", "Analyst", "Specialist", "Director", "Manager", "Evangelist", "Lead");
    $titles->hydrate([
        "emp_no" => $i,
        "title" => $first_title[array_rand($first_title, 1)] . " " . $second_title[array_rand($second_title, 1)],
        "from_date" => date("Y-m-d", $from_date),
        "to_date" => date("Y-m-d", time())
    ]);
    $titles_mapper ->create($titles);
    $i++;
  }
}
