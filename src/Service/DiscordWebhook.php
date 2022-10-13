<?php

namespace App\Service;

use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DiscordWebhook {

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $title = 'Undefied title';

    /**
     * @var string
     */
    private $type = 'Rich';

    /**
     * @var string
     */
    private $content = 'Empty content';

    /**
     * @param string $url
     */
    public function __construct(string $url) {
        $this->url = $url;
    }

    /**
     * @param $data
     * @return bool|string
     */
    public function sendMessage($data)
    {
        if(!empty($data)) {
            $ch = curl_init($this->url);
            $msg = "payload_json=" . urlencode($data)."";

            if(isset($ch)) {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $msg);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);

                return $result;
            }
        }

        return false;
    }

    /**
     * @return false|string
     */
    public function getMessage()
    {
        return json_encode([
            "content" => "<@&741281182234181752>".$this->getContent(), // Also works with @everyone
            "username" => "CzechSaber BOT", // TODO::Make settable
            "avatar_url" => "https://czechsaber.cz/build/images/logos/logo.png",
            "tts" => false,
            // "file" => "",
            "allowed_mentions" => ["parse" => []],
            "embeds" => [
                [
                    "title" => $this->getTitle(),
                    //"type" => $this->getType(),
                    "description" => "Description will be here, someday, you can mention users here also by calling userID <@12341234123412341>",
                    "url" => "https://czechsaber.cz",
                    "timestamp" => date("c", strtotime("now")),
                    "color" => hexdec( "3366ff" ),
                    "footer" => [
                        "text" => "czechsaber.cz/automatic-message",
                        "icon_url" => "https://czechsaber.cz/build/images/logos/logo.png"
                    ],
                    "image" => [
                        "url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=600"
                    ],
                    "thumbnail" => [
                        "url" => "https://czechsaber.cz/build/images/logos/full-wide-logo.png"
                    ],
                    "author" => [
                        "name" => "Czechsaber BOT", // TODO::Change it to sender from editor
                        "url" => "https://czechsaber.cz"
                    ],
                    "fields" => [
                        [
                            "name" => "Field #1 Name",
                            "value" => "Field #1 Value",
                            "inline" => false
                        ],
                        [
                            "name" => "Field #2 Name",
                            "value" => "Field #2 Value",
                            "inline" => true
                        ]
                    ]
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
    }

    /**
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getContent(): string {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void {
        $this->content = $content;
    }
}