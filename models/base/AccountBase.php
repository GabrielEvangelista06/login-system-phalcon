<?php

use Phalcon\Db\Column;
use Phalcon\Mvc\Model\MetaData;

class AccountBase extends ModelBase {

  protected $_primaryKeys = array('id');

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=32, nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $username;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=false)
     */
    protected $password;

    /**
     *
     * @var string
     * @Column(type="string", length=40, nullable=false)
     */
    protected $hash;

    /**
     *
     * @var timestamp
     * @Column(type="timestamp", nullable=true)
     */
    protected $last_access;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $credentials;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $acl;

    /**
     *
     * @var boolean
     * @Column(type="boolean", nullable=false)
     */
    protected $master;

    /**
     *
     * @var boolean
     * @Column(type="boolean", nullable=false)
     */
    protected $enabled;

    /**
     *
     * @var boolean
     * @Column(type="boolean", nullable=false)
     */
    protected $visible;

    /**
     *
     * @var boolean
     * @Column(type="boolean", nullable=false)
     */
    protected $deleted;

    /**
     *
     * @var timestamp
     * @Column(type="timestamp", nullable=false)
     */
    protected $created_at;

    /**
     *
     * @var timestamp
     * @Column(type="timestamp", nullable=false)
     */
    protected $updated_at;

	public function metadata(){
        
    return array(
      // Every column in the mapped table
      MetaData::MODELS_ATTRIBUTES => ['id', 'username', 'password', 'hash', 'last_access', 'credentials', 'acl', 'master', 'enabled', 'visible', 'deleted', 'created_at', 'updated_at'],

      // Every column part of the primary key
      MetaData::MODELS_PRIMARY_KEY => ['id'],

      // Every column that isn't part of the primary key
      MetaData::MODELS_NON_PRIMARY_KEY => ['id', 'username', 'password', 'hash', 'last_access', 'credentials', 'acl', 'master', 'enabled', 'visible', 'deleted', 'created_at', 'updated_at'],

      // Every column that doesn't allows null values
      MetaData::MODELS_NOT_NULL => ['id', 'username', 'password', 'hash', 'credentials', 'acl', 'master', 'enabled', 'visible', 'deleted', 'created_at', 'updated_at'],

      // Every column and their data types
      MetaData::MODELS_DATA_TYPES => ['id' => Column::TYPE_INTEGER, 'username' => Column::TYPE_VARCHAR, 'password' => Column::TYPE_VARCHAR, 'hash' => Column::TYPE_VARCHAR, 'last_access' => Column::TYPE_TIMESTAMP, 'credentials' => Column::TYPE_JSON, 'acl' => Column::TYPE_JSON, 'master' => Column::TYPE_BOOLEAN, 'enabled' => Column::TYPE_BOOLEAN, 'visible' => Column::TYPE_BOOLEAN, 'deleted' => Column::TYPE_BOOLEAN, 'created_at' => Column::TYPE_TIMESTAMP, 'updated_at' => Column::TYPE_TIMESTAMP],

      // The columns that have numeric data types
      MetaData::MODELS_DATA_TYPES_NUMERIC => ['id' => true],

      // The identity column, use boolean false if the model doesn't have an identity column
      MetaData::MODELS_IDENTITY_COLUMN => FALSE,

      // How every column must be bound/casted
      MetaData::MODELS_DATA_TYPES_BIND => ['id' => Column::BIND_PARAM_INT, 'username' => Column::BIND_PARAM_STR, 'password' => Column::BIND_PARAM_STR, 'hash' => Column::BIND_PARAM_STR, 'last_access' => Column::BIND_PARAM_STR, 'credentials' => Column::BIND_PARAM_STR, 'acl' => Column::BIND_PARAM_STR, 'master' => Column::BIND_PARAM_BOOL, 'enabled' => Column::BIND_PARAM_BOOL, 'visible' => Column::BIND_PARAM_BOOL, 'deleted' => Column::BIND_PARAM_BOOL, 'created_at' => Column::BIND_PARAM_STR, 'updated_at' => Column::BIND_PARAM_STR],

      // Fields that must be ignored from INSERT SQL statements
      MetaData::MODELS_AUTOMATIC_DEFAULT_INSERT => ['created_at' => true, 'updated_at' => true],

      // Fields that must be ignored from UPDATE SQL statements
      MetaData::MODELS_AUTOMATIC_DEFAULT_UPDATE => [],

      // Default values for columns
      MetaData::MODELS_DEFAULT_VALUES => ['id' => NULL, 'username' => NULL, 'password' => NULL, 'hash' => NULL, 'last_access' => NULL, 'credentials' => NULL, 'acl' => NULL, 'master' => 'false', 'enabled' => 'true', 'visible' => 'true', 'deleted' => 'false', 'created_at' => time(), 'updated_at' => time()],

      // Fields that allow empty strings
      MetaData::MODELS_EMPTY_STRING_VALUES => [],
    );
  }

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id, $force=false){

        if ((string)$this->id !== (string)$id) {
          $this->addModifiedColumn('id');
        }

        $this->id = ($id !== null ? (int)$id : null);

        return $this;
    }

    /**
     * Method to set the value of field username
     *
     * @param string $username
     * @return $this
     */
    public function setUsername($username, $force=false){

        if ((string)$this->username !== (string)$username) {
          $this->addModifiedColumn('username');
        }

        $this->username = $username || $force ? $username : null;

        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password, $force=false){

        if ((string)$this->password !== (string)$password) {
          $this->addModifiedColumn('password');
        }

        $this->password = $password || $force ? $password : null;

        return $this;
    }

    /**
     * Method to set the value of field hash
     *
     * @param string $hash
     * @return $this
     */
    public function setHash($hash, $force=false){

        if ((string)$this->hash !== (string)$hash) {
          $this->addModifiedColumn('hash');
        }

        $this->hash = $hash || $force ? $hash : null;

        return $this;
    }

    /**
     * Method to set the value of field last_access
     *
     * @param timestamp $last_access
     * @return $this
     */
    public function setLastAccess($last_access, $force=false){

        if ($this->formatDate($this->last_access, 'Y-m-d H:i:s') !== $this->formatDate($last_access, 'Y-m-d H:i:s')) {
          $this->addModifiedColumn('last_access');
        }

        $this->last_access = $this->formatDate($last_access, 'Y-m-d H:i:s');

        return $this;
    }

    /**
     * Method to set the value of field credentials
     *
     * @param string $credentials
     * @return $this
     */
    public function setCredentials($credentials, $force=false){

        if ((string)$this->credentials !== (string)$credentials) {
          $this->addModifiedColumn('credentials');
        }

        $this->credentials = $credentials || $force ? $credentials : null;

        return $this;
    }

    /**
     * Method to set the value of field acl
     *
     * @param string $acl
     * @return $this
     */
    public function setAcl($acl, $force=false){

        if ((string)$this->acl !== (string)$acl) {
          $this->addModifiedColumn('acl');
        }

        $this->acl = $acl || $force ? $acl : null;

        return $this;
    }

    /**
     * Method to set the value of field master
     *
     * @param boolean $master
     * @return $this
     */
    public function setMaster($master, $force=false){

        if ((string)$this->master !== (string)$master) {
          $this->addModifiedColumn('master');
        }

        $this->master = $master ? (bool)$master : false;

        return $this;
    }

    /**
     * Method to set the value of field enabled
     *
     * @param boolean $enabled
     * @return $this
     */
    public function setEnabled($enabled, $force=false){

        if ((string)$this->enabled !== (string)$enabled) {
          $this->addModifiedColumn('enabled');
        }

        $this->enabled = $enabled ? (bool)$enabled : false;

        return $this;
    }

    /**
     * Method to set the value of field visible
     *
     * @param boolean $visible
     * @return $this
     */
    public function setVisible($visible, $force=false){

        if ((string)$this->visible !== (string)$visible) {
          $this->addModifiedColumn('visible');
        }

        $this->visible = $visible ? (bool)$visible : false;

        return $this;
    }

    /**
     * Method to set the value of field deleted
     *
     * @param boolean $deleted
     * @return $this
     */
    public function setDeleted($deleted, $force=false){

        if ((string)$this->deleted !== (string)$deleted) {
          $this->addModifiedColumn('deleted');
        }

        $this->deleted = $deleted ? (bool)$deleted : false;

        return $this;
    }

    /**
     * Method to set the value of field created_at
     *
     * @param timestamp $created_at
     * @return $this
     */
    public function setCreatedAt($created_at, $force=false){

        if ($this->formatDate($this->created_at, 'Y-m-d H:i:s') !== $this->formatDate($created_at, 'Y-m-d H:i:s')) {
          $this->addModifiedColumn('created_at');
        }

        $this->created_at = $this->formatDate($created_at, 'Y-m-d H:i:s');

        return $this;
    }

    /**
     * Method to set the value of field updated_at
     *
     * @param timestamp $updated_at
     * @return $this
     */
    public function setUpdatedAt($updated_at, $force=false){

        if ($this->formatDate($this->updated_at, 'Y-m-d H:i:s') !== $this->formatDate($updated_at, 'Y-m-d H:i:s')) {
          $this->addModifiedColumn('updated_at');
        }

        $this->updated_at = $this->formatDate($updated_at, 'Y-m-d H:i:s');

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the value of field hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Returns the value of field last_access
     *
     * @return timestamp
     */
    public function getLastAccess($format = 'Y-m-d H:i:s')
    {
        return $this->formatDate($this->last_access, $format);
    }

    /**
     * Returns the value of field credentials
     *
     * @return string
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * Returns the value of field acl
     *
     * @return string
     */
    public function getAcl()
    {
        return $this->acl;
    }

    /**
     * Returns the value of field master
     *
     * @return boolean
     */
    public function getMaster($forceNull = false)
    {
        return $forceNull && $this->master === null ? null : (bool)$this->master;
    }

    /**
     * Returns the value of field enabled
     *
     * @return boolean
     */
    public function getEnabled($forceNull = false)
    {
        return $forceNull && $this->enabled === null ? null : (bool)$this->enabled;
    }

    /**
     * Returns the value of field visible
     *
     * @return boolean
     */
    public function getVisible($forceNull = false)
    {
        return $forceNull && $this->visible === null ? null : (bool)$this->visible;
    }

    /**
     * Returns the value of field deleted
     *
     * @return boolean
     */
    public function getDeleted($forceNull = false)
    {
        return $forceNull && $this->deleted === null ? null : (bool)$this->deleted;
    }

    /**
     * Returns the value of field created_at
     *
     * @return timestamp
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        return $this->formatDate($this->created_at, $format);
    }

    /**
     * Returns the value of field updated_at
     *
     * @return timestamp
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        return $this->formatDate($this->updated_at, $format);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
    
    parent::initialize();

        $this->setSchema("public");
        $this->belongsTo('id', '\Person', 'id', ['alias' => 'Person']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'account';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Account[]|Account
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Account
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'id' => 'id',
            'username' => 'username',
            'password' => 'password',
            'hash' => 'hash',
            'last_access' => 'last_access',
            'credentials' => 'credentials',
            'acl' => 'acl',
            'master' => 'master',
            'enabled' => 'enabled',
            'visible' => 'visible',
            'deleted' => 'deleted',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at'
        ];
    }

}
