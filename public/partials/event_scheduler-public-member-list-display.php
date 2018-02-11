<?php if (is_user_logged_in()) : ?>

<?php if (count($members) > 0): ?>
    <table>
        <?php foreach ($members as $member_id) {
            $user = get_userdata($member_id->ID);
            echo "<tr>";
            echo "<h4>" . $user->first_name . " " . $user->last_name . "</h4>";
            echo "<span>" . _e('Email','event_scheduler') . ": <a href=" . $user->user_email . ">" . $user->user_email . "</a></span><br>";
            if ($user->birthday) {
                echo "<span>" . _e('Birthday','event_scheduler') . ": " . DateTime::createFromFormat('Y-m-d', $user->birthday)->format('d.m.Y') . "</span><br>";
            }
            if ($user->phone1) {
                echo "<span>" . _e('Phone','event_scheduler') . ": " . $user->phone1 . "</span>";
            }
            echo "</tr>";
        }
        ?>
    </table>
<?php endif; ?>
<?php if (count($members) == 0): ?>
    <h4><?php _e('No active members exist.', 'event_scheduler');?></h4>
<?php endif; ?>

<?php else : ?>
    <div class="attention"><?php _e('Event Scheduler can only be used by active members.', 'event_scheduler');?></div>
<?php endif; ?>