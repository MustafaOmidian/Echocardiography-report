<form action="to_pdf.php" method="POST">
    <p>Patient name</p>
    <input type="text" name="name">
    <p>Aort</p>
    <input type="number" name="aort">
    <p>LA</p>
    <input type="number" name="la">
    <p>LVH</p>
    <input type="number" name="lvh">
    <p>PAP</p>
    <input type="number" name="pap">
    <p>EF</p>
    <input type="number" name="ef">
    <p>TAPSE</p>
    <input type="number" name="TAPSE">
    <br>
    <br>
    <label for="TF">TR</label>
    <br>
    <br>
    <select id="TF" name="TR">
        <option value="Normal">Normal</option>
        <option value="Mild">Mild</option>
        <option value="Moderate">Moderate</option>
		<option value="Severe">Severe</option>
    </select>
    <br>
    <br>
    <label for="TF">DD</label>
    <br>
    <br>
    <select id="TF" name="DD">
        <option value="No">No</option>
        <option value="G1">G1</option>
        <option value="G2">G2</option>
    </select>
    <br>
    <br>
    <label for="TF">MR</label>
    <br>
    <br>
    <select id="TF" name="MR">
        <option value="Normal">Normal</option>
        <option value="Mild">Mild</option>
        <option value="Moderate">Moderate</option>
		<option value="Severe">Severe</option>

    </select>
    <br>
    <br>
    <label for="TF">AI</label>
    <br>
    <br>
    <select id="TF" name="AI">
        <option value="Normal">Normal</option>
        <option value="Mild">Mild</option>
        <option value="Moderate">Moderate</option>
		<option value="Severe">Severe</option>

    </select>
    <br>
    <br>
    <label for="TF">PI</label>
    <br>
    <br>
    <select id="TF" name="PI">
        <option value="Normal">Normal</option>
        <option value="Mild">Mild</option>
        <option value="Moderate">Moderate</option>
		<option value="Severe">Severe</option>

    </select>
    <br>
    <br>
    <label for="TF">RV</label>
    <br>
    <br>
    <select id="TF" name="RV">
        <option value="Normal">Normal</option>
        <option value="Mild">Mild</option>
        <option value="Moderate">Moderate</option>
		<option value="Severe">Severe</option>
    </select>
    <br>
    <br>
    <p>Conclusion</p>
    <textarea name="Conclusion" rows="4" cols="50"></textarea>
    <br>
    <br>
    <input type="submit" value="Send"><input type="reset" value="Clear">
</form>
