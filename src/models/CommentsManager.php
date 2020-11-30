<?php

namespace Model;

use Entity\Comments;
use TheFramework\Manager;

abstract class CommentsManager extends Manager{
    public abstract function getAll(int $idNews);
    public abstract function save(Comments $comment);
}