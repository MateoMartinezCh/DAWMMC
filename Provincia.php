<?php
class Provincia implements JsonSerializable
{
    protected $name;
    protected $id;
    protected $active;
    protected $localidades;
    function __construct()
    {
    }
    function loadfromJSON(string $json)
    {

        $tempo = json_decode($json, true);
        $this->id = $tempo["id"];
        $this->name = $tempo["name"];
        $this->active = $tempo["active"];
    }
    function getName(): string
    {
        return $this->name;
    }
    function getId(): int
    {
        return $this->id;
    }
    function getActive(): int
    {
        return $this->active;
    }
    function setName(string $name)
    {
        $this->name = $name;
    }
    function setActive(bool $active)
    {
        $this->active = $active;
    }
    function setId(int $id)
    {
        $this->id = $id;
    }
    public function  jsonSerialize()
    {
        return
            [
                'id'   => $this->getId(),
                'name' => $this->getName(),
                'active' => $this->getActive()

                //'localidades' => $this->getLocalidades()
            ];
    }
    public function addLocalidad(Localidad  $localidad): void
    {
        $this->localidades["{$localidad->getName()}"] = $localidad;
    }
}
