<?php

declare(strict_types=1);

namespace Ana\FdsApp\Http;

final class RedirectResponse extends Response
{
    public function __construct(
        private readonly string $url,
        int $status = 302
    ) {
        parent::__construct('', $status);
    }

    public function send(): void
    {
        http_response_code($this->status);

        header("Location: {$this->url}");

        exit;
    }
}