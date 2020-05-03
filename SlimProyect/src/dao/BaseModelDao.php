<?php


  namespace Horarios\Dao;


  use Horarios\Config\Connection;
  use Horarios\Constants\Constants;
  use Monolog\Handler\RotatingFileHandler;
  use Monolog\Logger;


  class BaseModelDao
  {
    private $logger;

    public function __construct()
    {
      $this->logger = new Logger(self::class);
      $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . '/querys.log', Constants::MAX_FILES_LOGS));
      $this->logger->pushHandler(new RotatingFileHandler(Constants::LOGS_PATH . '/errors.log', Constants::MAX_FILES_LOGS,Logger::ERROR));
    }

    public function findAll()
    {
      $connection = Connection::getInstance()->getConnection();
      $stmt = $connection->prepare("SELECT 1");
      $stmt->execute();
      $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
      $pesajes = $stmt->fetchAll($connection::FETCH_ASSOC);
      $this->logger->notice("Objetos obtenidos", array('objeto' => $pesajes));
      return $pesajes;
    }
  }