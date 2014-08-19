<?php
namespace Dkd\PhpCmis;

use Dkd\PhpCmis\Data\ContentStreamInterface;
use Dkd\PhpCmis\Data\RenditionDataInterface;

/**
 * Rendition.
 */
interface RenditionInterface extends RenditionDataInterface
{
    /**
     * Returns the content stream of the rendition.
     *
     * @return ContentStreamInterface the content stream of the rendition or null if the rendition has no content
     */
    public function getContentStream();

    /**
     * Returns the height in pixels if the rendition is an image.
     *
     * @return int the height in pixels or -1 if the height is not available or the rendition is not an image
     */
    public function getHeight();

    /**
     * Returns the size of the rendition in bytes if available.
     *
     * @return int the size of the rendition in bytes or -1 if the size is not available
     */
    public function getLength();

    /**
     * Returns the rendition document using the provides OperationContext if the rendition is a stand-alone document.
     *
     * @param OperationContextInterface $context
     * @return DocumentInterface|null the rendition document or null if there is no rendition document
     */
    public function getRenditionDocument(OperationContextInterface $context = null);

    /**
     * Returns the width in pixels if the rendition is an image.
     *
     * @return int the width in pixels or -1 if the width is not available or the rendition is not an image
     */
    public function getWidth();
}