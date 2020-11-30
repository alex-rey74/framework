<?php

namespace Model;

use Entity\Comments;

class CommentsManagerPDO extends CommentsManager{
    public function getAll(int $idNews)
    {
        $query = $this->dao->prepare('SELECT * FROM comments WHERE news = :id');
        $query->bindValue(':id', $idNews);

        $query->setFetchMode(\PDO::FETCH_CLASS, 'Entity\News');
        $query->execute();

        return $query->fetchAll();
    }

    public function save(Comments $comment)
    {
        $query = $this->dao->prepare('INSERT INTO news (news, auteur, contenu, date) VALUES (:news, :auteur, :contenu, :date');
        $query->bindValue(':news', $comment->getNews());
        $query->bindValue(':auteur',  $comment->getAuteur());
        $query->bindValue(':contenu', $comment->getContenu());
        $query->bindValue(':date', $comment->getDate());
    }
}