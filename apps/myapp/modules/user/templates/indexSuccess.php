<?php slot('title',"hello title.") ?>
<h1>User detailss List</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>User name</th>
      <th>User password</th>
      <th>Is activated</th>
      <th>User email</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($user_detailss as $user_details): ?>
      <tr>
        <td><a href="<?php echo url_for('user/show?id='.$user_details->getId()) ?>"><?php echo $user_details->getId() ?></a></td>
        <td><?php echo $user_details->getUserName() ?></td>
        <td><?php echo $user_details->getUserPassword() ?></td>
        <td><?php echo $user_details->getIsActivated() ?></td>
        <td><?php echo $user_details->getUserEmail() ?></td>
        <td><?php echo $user_details->getCreatedAt() ?></td>
        <td><?php echo $user_details->getUpdatedAt() ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('user/new') ?>">New</a>
