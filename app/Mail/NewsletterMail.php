<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $productName;
    public $productImage;
    public $productDescription;
    public $productPrice;
    public $messageContent;
    public $productUrl;


    public function __construct($data)
    {
        $this->productName = $data['productName'];
        $this->productImage = $data['productImage'];
        $this->productDescription = $data['productDescription'];
        $this->productPrice = $data['productPrice'];
        $this->messageContent = $data['messageContent'];
        $this->productUrl = $data['productUrl'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Newsletter Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.newsletter',
            with: [
                'productName' => $this->productName,
                'productImage' => $this->productImage,
                'productDescription' => $this->productDescription,
                'productPrice' => $this->productPrice,
                'messageContent' => $this->messageContent,
                'productUrl' => $this->productUrl,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
