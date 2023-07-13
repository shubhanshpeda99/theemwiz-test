<?= $this->extend('layouts/profile') ?>

<?= $this->section('metaTitle') ?>Profile <?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1 class="navbar">Profile</h1>

<div class="container p-2 mt-2">

    <?= form_open('/Profile/update') ?>
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="" name="name" value="<?= old('name', esc($user->name)) ?>">

    </div>
    <div class="form-group">
        <label for="">Phone No</label>
        <input type="number" class="form-control" id="" aria-describedby="emailHelp" placeholder="" name="phone_no" value="<?= old('phone_no', esc($user->phone_no)) ?>">

    </div>

    <div class="form-group">
        <label for="">Email address</label>
        <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="" name="email" value="<?= old('email', esc($user->email)) ?>">

    </div>

    <button type="submit" class="btn btn-outline-primary font-weight-bold">Submit</button>
    </form>

    <a class="btn btn-outline-info mt-2 mr-2 font-weight-bold" href="<?= site_url('login/index') ?>">Back</a>
    <a href="<?= site_url('/Profile/editPassword') ?>">Change Password</a>
</div>

<?= $this->endSection() ?>