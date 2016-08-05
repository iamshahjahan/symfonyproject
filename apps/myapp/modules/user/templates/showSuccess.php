<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $user_details->getId() ?></td>
    </tr>
    <tr>
      <th>User name:</th>
      <td><?php echo $user_details->getUserName() ?></td>
    </tr>
    <tr>
      <th>User password:</th>
      <td><?php echo $user_details->getUserPassword() ?></td>
    </tr>
    <tr>
      <th>Is activated:</th>
      <td><?php echo $user_details->getIsActivated() ?></td>
    </tr>
    <tr>
      <th>User email:</th>
      <td><?php echo $user_details->getUserEmail() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $user_details->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $user_details->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('user/edit?id='.$user_details->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('user/index') ?>">List</a>
