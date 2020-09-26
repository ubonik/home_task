<?php


namespace App\Service;


use Demontpx\ParsedownBundle\Parsedown;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class MarkdownParser
{
    /**
     * @var Parsedown
     */
    private $parsedown;
    /**
     * @var AdapterInterface
     */
    private $cache;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(Parsedown $parsedown, AdapterInterface $cache, LoggerInterface $logger)
    {
        $this->parsedown = $parsedown;
        $this->cache = $cache;
        $this->logger = $logger;
    }

    public function parse(string $source): string
    {
        if(stripos($source, 'кофе') !== false){
            $this->logger->info('Кажется эта статья о кофе');
        }

        return $this->cache->get('markdown_' . md5($source), function() use ($source){
               return $this->parsedown->text($source);
        });
    }
}