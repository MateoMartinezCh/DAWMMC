<?php
class Provincia implements JsonSerializable
{
    protected $name;
    protected $id;
    protected $acive;
    protected $localidades;
    function __construct()
    {
    }
    function loadfromJSON(string $json)
    {

        $tempo = json_decode($json, true);
        $this->id = $tempo["id"];
        $this->name = $tempo["name"];
        $this->acive = $tempo["acive"];
    }
    function getName(): string
    {
        return $this->name;
    }
    function getId(): int
    {
        return $this->id;
    }
    function getAcive(): int
    {
        return $this->acive;
    }
    function setName(string $name)
    {
        $this->name = $name;
    }
    function setAcive(bool $acive)
    {
        $this->acive = $acive;
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
                'localidades' => $this->getLocalidades()
            ];
    }
    public function addLocalidad(Localidad  $localidad): void
    {
        $this->localidades["{$localidad->getName()}"] = $localidad;
    }
    public function getLocalidades(): array
    {
        $localidades = [];
        foreach ($this->localidades as $localidad) {
            $localidades[] = $localidad->jsonSerialize();
        }
        return $localidades;
    }
}
