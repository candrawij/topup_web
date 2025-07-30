<div class="card shadow mb-3 border-0" style="background-color: #343a40;">
    <div class="card-header bg-dark">
        <h5 class="card-title text-light mb-0">Lengkapi Data</h5>
    </div>
    <div class="card-body p-3">
        <div id="userData">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-2">
                        <label class="text-light mb-1">Server/Zone ID</label>
                        <select class="form-control form-control-sm shadow" name="server_id" id="server_id" required>
                            <option value="">-- Pilih Server --</option>
                            <option value="prod_official_usa">AMERICA</option>
                            <option value="prod_official_asia">ASIA</option>
                            <option value="prod_official_eur">EUROPE</option>
                            <option value="prod_official_cht">TW_HK_MO</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-2">
                        <label class="text-light mb-1">User ID</label>
                        <input class="form-control form-control-sm shadow" placeholder="Masukkan User ID" type="text" name="player_id" id="player_id" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>