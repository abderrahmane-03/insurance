<?php
interface IAssuranceService {
    function insert(Assurance $assurance);
    function edit(Assurance $assurance);
    function delete($assurance_ID);
    function display();
}
?>