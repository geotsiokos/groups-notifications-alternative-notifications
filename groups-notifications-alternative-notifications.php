<?php
/**
 * groups-notifications-alternative-notifications.php
 *
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This header and all notices must be kept intact.
 *
 * @author gtsiokos
 * @package groups-notifications-alternative-notifications
 * @since groups-notifications-alternative-notifications 1.0.0
 *
 * Plugin Name: Groups Notifications Alternative Notifications
 * Plugin URI: https://github.com/geotsiokos/groups-notifications-alternative-notifications
 * Description: Alternative notifications for Groups Notifications plugin by itthinx.com.
 * Version: 1.0.0
 * Author: gtsiokos
 * Author URI: http://www.netpad.gr
 * Donate-Link: http://www.netpad.gr
 * License: GPLv3
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}
class Groups_Notifications_Alternative_Notifications {

	public static function init() {
		// When a user joins a group
		add_filter( 'groups_notifications_notify_admin_user_joined_subject', array( __CLASS__, 'groups_notifications_notify_admin_user_joined_subject' ), 10, 2 );
		add_filter( 'groups_notifications_notify_admin_user_joined_message', array( __CLASS__, 'groups_notifications_notify_admin_user_joined_message' ), 10, 2 );
		add_filter( 'groups_notifications_notify_user_joined_subject', array( __CLASS__, 'groups_notifications_notify_user_joined_subject' ), 10, 2 );
		add_filter( 'groups_notifications_notify_user_joined_message', array( __CLASS__, 'groups_notifications_notify_user_joined_message' ), 10, 2 );

		// When a user leaves a group
		add_filter( 'groups_notifications_notify_admin_user_left_subject', array( __CLASS__, 'groups_notifications_notify_admin_user_left_subject' ), 10, 2 );
		add_filter( 'groups_notifications_notify_admin_user_left_message', array( __CLASS__, 'groups_notifications_notify_admin_user_left_message' ), 10, 2 );
		add_filter( 'groups_notifications_notify_user_left_subject', array( __CLASS__, 'groups_notifications_notify_user_left_subject' ), 10, 2 );
		add_filter( 'groups_notifications_notify_user_left_message', array( __CLASS__, 'groups_notifications_notify_user_left_message' ), 10, 2 );
		
	}

	public static function groups_notifications_notify_admin_user_joined_subject( $subject, $params ) {
		if ( isset( $params['group'] ) ) {
			$group = $params['group'];
			if ( $group->name === 'Advanced' ) {
				$subject = 'There is a new [group_name] group member';
			}
		}
		return $subject;
	}

	public static function groups_notifications_notify_admin_user_joined_message( $message, $params ) {
		if ( isset( $params['group'] ) ) {
			$group = $params['group'];
			if ( $group->name === 'Advanced' ) {
				$message = 'Hey admin,<br/>[user_login] is now a member of the [group_name] group at <a href="[site_url]">[site_title]</a>.<br/>';
			}
		}
		return $message;
	}

	public static function groups_notifications_notify_user_joined_subject( $subject, $params ) {
		if ( isset( $params['group'] ) ) {
			$group = $params['group'];
			if ( $group->name === 'Advanced' ) {
				$subject = 'Hi and welcome to the [group_name] group';
			}
		}
		return $subject;
	}
	
	public static function groups_notifications_notify_user_joined_message( $message, $params ) {
		if ( isset( $params['group'] ) ) {
			$group = $params['group'];
			if ( $group->name === 'Advanced' ) {
				$message = 'Hey [user_login],<br/>You are now a member of the [group_name] group at <a href="[site_url]">[site_title]</a>.<br/>';
			}
		}
		return $message;
	}

	public static function groups_notifications_notify_admin_user_left_subject( $subject, $params ) {
		if ( isset( $params['group'] ) ) {
			$group = $params['group'];
			if ( $group->name === 'Advanced' ) {
				$subject = 'FYI admin,[user_login] has left the [group_name] group';
			}
		}
		return $subject;
	}
	
	public static function groups_notifications_notify_admin_user_left_message( $message, $params ) {
		if ( isset( $params['group'] ) ) {
			$group = $params['group'];
			if ( $group->name === 'Advanced' ) {
				$message = 'Hey admin,<br/>[user_login] has left the [group_name] group at <a href="[site_url]">[site_title]</a>.<br/>';
			}
		}
		return $message;
	}
	
	public static function groups_notifications_notify_user_left_subject( $subject, $params ) {
		if ( isset( $params['group'] ) ) {
			$group = $params['group'];
			if ( $group->name === 'Advanced' ) {
				$subject = 'Sorry to see you leave [group_name] group';
			}
		}
		return $subject;
	}
	
	public static function groups_notifications_notify_user_left_message( $message, $params ) {
		if ( isset( $params['group'] ) ) {
			$group = $params['group'];
			if ( $group->name === 'Advanced' ) {
				$message = 'We are sorry to see you [user_login] leaving the [group_name] group at <a href="[site_url]">[site_title]</a>.<br/>';
			}
		}
		return $message;
	}

} Groups_Notifications_Alternative_Notifications::init();