<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Workflow;

use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class WorkflowRealTimeStatisticsContext extends InstanceContext {
    /**
     * Initialize the WorkflowRealTimeStatisticsContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $workspaceSid The workspace_sid
     * @param string $workflowSid The workflow_sid
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Workflow\WorkflowRealTimeStatisticsContext 
     */
    public function __construct(Version $version, $workspaceSid, $workflowSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, 'workflowSid' => $workflowSid);

        $this->uri = '/Workspaces/' . rawurlencode($workspaceSid) . '/Workflows/' . rawurlencode($workflowSid) . '/RealTimeStatistics';
    }

    /**
     * Fetch a WorkflowRealTimeStatisticsInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return WorkflowRealTimeStatisticsInstance Fetched
     *                                            WorkflowRealTimeStatisticsInstance
     */
    public function fetch($options = array()) {
        $options = new Values($options);

        $params = Values::of(array('TaskChannel' => $options['taskChannel']));

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new WorkflowRealTimeStatisticsInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid'],
            $this->solution['workflowSid']
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Taskrouter.V1.WorkflowRealTimeStatisticsContext ' . implode(' ', $context) . ']';
    }
}