<?php

namespace Core\Response;

use Psr\Http\Message\ResponseInterface;

class Sender
{
    public static function send(ResponseInterface $reponse)
    {
        ob_clean();

		ob_start();

        http_response_code($reponse->getStatusCode());

        foreach ($reponse->getHeaders() as $name => $values)
            foreach ($values as $value)
                header(sprintf('%s: %s', $name, $value), false);

        echo $reponse->getBody()->getContents();

        die();

    }
}
