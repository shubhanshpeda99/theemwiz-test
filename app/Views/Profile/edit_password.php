<?= $this->extend('layouts/profile') ?>

<?= $this->section('metaTitle') ?>Profile <?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1 class="navbar">Change Password</h1>

<div class="container p-2 mt-2">
    <?= form_open('/Profile/updatePassword') ?>


    <div class="form-group">
        <label for="">Current Password</label>
        <input type="password" class="form-control" name="current_password" id="" placeholder="Enter Current Password.">
    </div>

    <div class="form-group">
        <label for="validationDefaultpass">New Password</label>
        <input type="text" class="form-control" name="password" id="validationDefaultpass" placeholder="Enter New Password.">
    </div>

    <div class="form-group">
        <label for="validationDefaultpass">Repeat New Password</label>
        <input type="text" class="form-control" id="" name="password_confirmation" id="" placeholder="ReEnter New Password.">
    </div>


    <button type="submit" class="btn btn-outline-primary font-weight-bold">Save Changes</button>
    </form>

    <a class="btn btn-outline-info mt-2 mr-2 font-weight-bold" href="<?= site_url('/Profile/edit') ?>">Back</a>
</div>

<?= $this->endSection() ?>