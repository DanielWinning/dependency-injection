<?php

namespace DannyXCII\DependencyInjection\Exception;

use Psr\Container\NotFoundExceptionInterface;

class NotFoundException implements NotFoundExceptionInterface
{
    private string $message;
    private int $code;
    private ?\Throwable $previous;

    public function __construct(string $message = 'Entry not found', int $code = 0, $previous = null) {
        $this->message = $message;
        $this->code = $code;
        $this->previous = $previous;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return \Throwable|null
     */
    public function getPrevious(): ?\Throwable
    {
        return $this->previous;
    }

    /**
     * @return array
     */
    public function getTrace(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getTraceAsString(): string
    {
        return '';
    }

    /**
     * @return int
     */
    public function getLine(): int
    {
        return 0;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return '';
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}




