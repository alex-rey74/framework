<?php

namespace Model;

use TheFramework\Manager;

abstract class NewsManager extends Manager{

    public abstract function getAll(int $limit = -1, int $offset = -1);

    public abstract function getById(int $id);
}