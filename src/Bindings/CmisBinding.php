<?php
namespace Dkd\PhpCmis\Bindings;

use Dkd\PhpCmis\AclServiceInterface;
use Dkd\PhpCmis\Bindings\Browser\RepositoryService;
use Dkd\PhpCmis\Data\BindingsObjectFactoryInterface;
use Dkd\PhpCmis\DataObjects\BindingsObjectFactory;
use Dkd\PhpCmis\VersioningServiceInterface;
use Dkd\PhpCmis\DiscoveryServiceInterface;
use Dkd\PhpCmis\Enum\BindingType;
use Dkd\PhpCmis\Exception\CmisInvalidArgumentException;
use Dkd\PhpCmis\Exception\CmisRuntimeException;
use Dkd\PhpCmis\MultiFilingServiceInterface;
use Dkd\PhpCmis\NavigationServiceInterface;
use Dkd\PhpCmis\ObjectServiceInterface;
use Dkd\PhpCmis\PolicyServiceInterface;
use Dkd\PhpCmis\RelationshipServiceInterface;
use Dkd\PhpCmis\RepositoryServiceInterface;
use Dkd\PhpCmis\SessionParameter;
use Doctrine\Common\Cache\Cache;

/**
 * This file is part of php-cmis-lib.
 *
 * (c) Sascha Egerer <sascha.egerer@dkd.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class CmisBinding implements CmisBindingInterface
{
    /**
     * @var BindingSessionInterface
     */
    protected $session;

    /**
     * @var RepositoryService
     */
    protected $repositoryService;

    /**
     * @var BindingsObjectFactoryInterface
     */
    protected $objectFactory;

    /**
     * @param BindingSessionInterface $session
     * @param array $sessionParameters
     * @param Cache|null $typeDefinitionCache
     * @param BindingsObjectFactoryInterface|null $objectFactory
     */
    public function __construct(
        BindingSessionInterface $session,
        array $sessionParameters,
        Cache $typeDefinitionCache = null,
        BindingsObjectFactoryInterface $objectFactory = null
    ) {
        if (count($sessionParameters) === 0) {
            throw new CmisRuntimeException('Session parameters must be set!');
        }

        if (!isset($sessionParameters[SessionParameter::BINDING_CLASS])) {
            throw new CmisInvalidArgumentException('Session parameters do not contain a binding class name!');
        }

        $this->session = $session;

        foreach ($sessionParameters as $key => $value) {
            $this->session->put($key, $value);
        }

        // if ($typeDefinitionCache !== null) {
        //     @TODO add cache
        // }

        if ($objectFactory !== null) {
            $this->objectFactory = $objectFactory;
        } else {
            $this->objectFactory = new BindingsObjectFactory();
        }
        $this->repositoryService = new RepositoryService($this->session);
    }

    /**
     * Clears all caches of the current CMIS binding session.
     */
    public function clearAllCaches()
    {
        throw new \Exception('Not yet implemented!');
        // TODO: Implement clearAllCaches() method.
    }

    /**
     * Clears all caches of the current CMIS binding session that are related to the given repository.
     *
     * @param string $repositoryId
     */
    public function clearRepositoryCache($repositoryId)
    {
        throw new \Exception('Not yet implemented!');
        // TODO: Implement clearRepositoryCache() method.
    }

    /**
     * Releases all resources assigned to this binding instance.
     */
    public function close()
    {
        throw new \Exception('Not yet implemented!');
        // TODO: Implement close() method.
    }

    /**
     * Gets an ACL Service interface object.
     *
     * @return AclServiceInterface
     */
    public function getAclService()
    {
        throw new \Exception('Not yet implemented!');
        // TODO: Implement getAclService() method.
    }

    /**
     * Returns the binding type.
     *
     * @return BindingType
     */
    public function getBindingType()
    {
        throw new \Exception('Not yet implemented!');
        // TODO: Implement getBindingType() method.
    }

    /**
     * Gets a Discovery Service interface object.
     *
     * @return DiscoveryServiceInterface
     */
    public function getDiscoveryService()
    {
        throw new \Exception('Not yet implemented!');
        // TODO: Implement getDiscoveryService() method.
    }

    /**
     * Gets a Multifiling Service interface object.
     *
     * @return MultiFilingServiceInterface
     */
    public function getMultiFilingService()
    {
        throw new \Exception('Not yet implemented!');
        // TODO: Implement getMultiFilingService() method.
    }

    /**
     * Gets a Navigation Service interface object.
     *
     * @return NavigationServiceInterface
     */
    public function getNavigationService()
    {
        throw new \Exception('Not yet implemented!');
        // TODO: Implement getNavigationService() method.
    }

    /**
     * Gets a factory for CMIS binding specific objects.
     *
     * @return BindingsObjectFactoryInterface
     */
    public function getObjectFactory()
    {
        return $this->objectFactory;
    }

    /**
     * Gets an Object Service interface object.
     *
     * @return ObjectServiceInterface
     */
    public function getObjectService()
    {
        return $this->getCmisBindingsHelper()->getSpi($this->session)->getObjectService();
    }

    /**
     * Gets a Policy Service interface object.
     *
     * @return PolicyServiceInterface
     */
    public function getPolicyService()
    {
        throw new \Exception('Not yet implemented!');
        // TODO: Implement getPolicyService() method.
    }

    /**
     * Gets a Relationship Service interface object.
     *
     * @return RelationshipServiceInterface
     */
    public function getRelationshipService()
    {
        throw new \Exception('Not yet implemented!');
        // TODO: Implement getRelationshipService() method.
    }

    /**
     * Gets a Repository Service interface object.
     *
     * @return RepositoryServiceInterface
     */
    public function getRepositoryService()
    {
        return $this->repositoryService;
    }

    /**
     * Returns the client session id.
     *
     * @return string
     */
    public function getSessionId()
    {
        throw new \Exception('Not yet implemented!');
        // TODO: Implement getSessionId() method.
    }

    /**
     * Gets a Versioning Service interface object.
     *
     * @return VersioningServiceInterface
     */
    public function getVersioningService()
    {
        throw new \Exception('Not yet implemented!');
        // TODO: Implement getVersioningService() method.
    }

    /**
     * @return CmisBindingsHelper
     */
    public function getCmisBindingsHelper()
    {
        return new CmisBindingsHelper();
    }
}
