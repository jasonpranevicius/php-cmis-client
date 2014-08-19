<?php
namespace Dkd\PhpCmis\Data;

/**
 * Represents the objects in a folder.
 */
interface ObjectInFolderListInterface extends ExtensionsDataInterface
{
    /**
     * Returns the total number of the objects in the folder.
     *
     * @return int|null the total number of the objects or null if the repository didn't provide the number
     */
    public function getNumItems();

    /**
     * Returns the objects in the folder.
     *
     * @return ObjectInFolderDataInterface[] the objects in the folder, not null
     */
    public function getObjects();

    /**
     * Indicates if there are more objects in the folder.
     *
     * @return boolean|null true if there are more objects,
     * false if there are not more objects, or null if the repository didn't provide this flag
     */
    public function hasMoreItems();
}