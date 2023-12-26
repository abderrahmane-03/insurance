<?php
interface IClientService {
    function insert(Client $client);
    function edit(Client $client);
    function delete($client_ID);
    function display();
}
?>