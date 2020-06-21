<?php

include_once __DIR__ . '/../dao/PersonaDAO.php';

$tot = PersonaDAO::totPersone();
echo json_encode($tot);