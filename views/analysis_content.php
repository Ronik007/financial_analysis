<div class="container-fluid">
    <h1 class="text-center mt-5">Results Analysis</h1>
    <div class="container mt-5 px-md-5 py-md-5 px-4 py-4 result_form_container">
        <form id="result_entry_form" method="post" class="d-flex align-items-center justify-content-center flex-wrap">
            <div class="mb-3 col-12 col-md-3 pe-md-3">
                <label for="company_name" class="form-label">Company Name</label>
                <input required autocomplete class="form-control" list="companies" name="company_name" id="company_name"
                    placeholder="Enter the Company Name">
                <datalist id="companies">
                    <?php
                    $sql = 'SELECT Name FROM company';
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['Name']}'>";
                    }
                    ?>
                </datalist>
            </div>
            <div class="mb-3 col-12 col-md-3 px-md-2">
                <label for="quarter" class="form-label">Quarter</label>
                <select required class="form-select form-select-md" name="quarter" id="quarter">
                    <option value="" selected disabled>Select the Quarter</option>
                    <option value="q1">Q1</option>
                    <option value="q2">Q2</option>
                    <option value="q3">Q3</option>
                    <option value="q4">Q4</option>
                </select>
            </div>
            <div class="mb-3 col-12 col-md-3 px-md-2">
                <label for="financial_year" class="form-label">Financial Year</label>
                <select required class="form-select form-select-md" name="financial_year" id="financial_year">
                    <option value="" disabled>Select the Financial Year</option>
                    <?php
                    $year = date('y');
                    $month = date('n');
                    for ($i = $year - 2; $i < $year + 1; $i++) {
                        if ($i == $year && $month > 6) {
                            echo "<option selected value='" . ($i + 1) . "'>FY{$i} - " . ($i + 1) . "</option>";
                        } else {
                            if ($i == $year - 1 && $month <= 6) {
                                echo "<option selected value='" . ($i + 1) . "'>FY{$i} - " . ($i + 1) . "</option>";
                            } else {
                                echo "<option value='" . ($i + 1) . "'>FY{$i} - " . ($i + 1) . "</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3 col-12 col-md-3 ps-md-3">
                <label for="amount_in" class="form-label">Amount In</label>
                <select required class="form-select form-select-md" name="amount_in" id="amount_in">
                    <option value="" selected disabled>Select Amount In</option>
                    <option value="cr">Crore</option>
                    <option value="lk">Lakhs</option>
                    <option value="mn">Millions</option>
                </select>
            </div>
            <div class="mb-4 col-12 col-md-4 pe-md-3">
                <fieldset>
                    <legend> Current Quarter </legend>
                    <label for="current_rev" class="form-label">Revenue <span class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="current_rev" id="current_rev"
                        placeholder="Enter the Revenue">
                    <label for="current_expanse" class="form-label">Expanses <span
                            class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="current_expanse"
                        id="current_expanse" placeholder="Enter the Expanses">
                    <label for="current_da" class="form-label">Depreciation & Amortization <span
                            class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="current_da" id="current_da"
                        placeholder="Enter the Depreciation & Amortization ">
                    <label for="current_tax" class="form-label">Total Tax <span class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="current_tax" id="current_tax"
                        placeholder="Enter the Total Tax">
                    <label for="current_pat" class="form-label">Profit after Tax (PAT) <span
                            class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="current_pat" id="current_pat"
                        placeholder="Enter the PAT">
                </fieldset>
            </div>
            <div class="mb-4 col-12 col-md-4 px-md-2">
                <fieldset>
                    <legend> Previous Quarter (Q-o-Q) </legend>
                    <label for="prev_qoq_rev" class="form-label">Revenue <span class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="prev_qoq_rev"
                        id="prev_qoq_rev" placeholder="Enter the Revenue">
                    <label for="prev_qoq_expanse" class="form-label">Expanses <span
                            class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="prev_qoq_expanse"
                        id="prev_qoq_expanse" placeholder="Enter the Expanses">
                    <label for="prev_qoq_da" class="form-label">Depreciation & Amortization <span
                            class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="prev_qoq_da" id="prev_qoq_da"
                        placeholder="Enter the Depreciation & Amortization">
                    <label for="prev_qoq_tax" class="form-label">Total Tax <span class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="prev_qoq_tax"
                        id="prev_qoq_tax" placeholder="Enter the Total Tax">
                    <label for="prev_qoq_pat" class="form-label">Profit after Tax (PAT) <span
                            class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="prev_qoq_pat"
                        id="prev_qoq_pat" placeholder="Enter the PAT">
                </fieldset>
            </div>
            <div class="mb-4 col-12 col-md-4 ps-md-3">
                <fieldset>
                    <legend> Previous Year Quarter (Y-o-Y) </legend>
                    <label for="prev_yoy_rev" class="form-label">Revenue <span class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="prev_yoy_rev"
                        id="prev_yoy_rev" placeholder="Enter the Expanses">
                    <label for="prev_yoy_expanse" class="form-label">Expanses <span
                            class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="prev_yoy_expanse"
                        id="prev_yoy_expanse" placeholder="Enter the Expanses">
                    <label for="prev_yoy_da" class="form-label">Depreciation & Amortization <span
                            class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="prev_yoy_da" id="prev_yoy_da"
                        placeholder="Enter the Depreciation & Amortization">
                    <label for="prev_yoy_tax" class="form-label">Total Tax <span class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="prev_yoy_tax"
                        id="prev_yoy_tax" placeholder="Enter the Total Tax">
                    <label for="prev_yoy_pat" class="form-label">Profit after Tax (PAT) <span
                            class="required_field">*</span></label>
                    <input required type="text" class="numberData form-control mb-3" name="prev_yoy_pat"
                        id="prev_yoy_pat" placeholder="Enter the PAT">
                </fieldset>
            </div>
            <button type="submit" id="result_submit_btn" class="mt-3 btn">Submit Financial
                Results
                <div id="btn_loader"></div>
            </button>
        </form>
        <div id="form_notification"><span class="alert"></span></div>
    </div>
</div>