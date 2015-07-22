<?php

namespace johnitvn\composerruntime;

use johnitvn\cliruntime\CommandBuidler;
use johnitvn\cliruntime\CliRuntimeProcess;
use johnitvn\cliruntime\CommandFinder;
use johnitvn\composerruntime\ComposerNotInstalledException;

/**
 * @author John Martin <john.itvn@gmail.com>
 * @since 1.0.0
 */
class ComposerProcess extends CliRuntimeProcess {

    protected $command;

    public function run($params) {
        $builder = new CommandBuidler($this->getCommand());
        if (!is_array($params)) {
            $builder->addParam($params);
        } else {
            foreach ($params as $param) {
                $builder->addParam($param);
            }
        }
        return parent::run($builder->getCommand());
    }

    public function runCapture($params, array &$output) {
        $builder = new CommandBuidler($this->getCommand());
        if (!is_array($params)) {
            $builder->addParam($params);
        } else {
            foreach ($params as $param) {
                $builder->addParam($param);
            }
        }
        return parent::runCapture($builder->getCommand(), $output);
    }

    public function runDisplayOutput($params) {
        $builder = new CommandBuidler($this->getCommand());
        if (!is_array($params)) {
            $builder->addParam($params);
        } else {
            foreach ($params as $param) {
                $builder->addParam($param);
            }
        }
        return parent::runDisplayOutput($builder->getCommand());
    }

    public function setCommand($command) {
        $this->command = $command;
    }

    /**
     *
     * @return string The command
     */
    public function getCommand() {
        if (!$this->command) {
            $localComposerPhar = $this->workingDir . DIRECTORY_SEPARATOR . 'composer.phar';
            $localComposer = $this->workingDir . DIRECTORY_SEPARATOR . 'composer';

            if (file_exists($localComposer) || CommandFinder::findCommand('composer') !== null) {
                $this->command = 'composer';
            } else if (file_exists($localComposerPhar) || CommandFinder::findCommand('composer.phar') !== null) {
                $this->command = 'php composer.phar';
            } else {
                throw new ComposerNotInstalledException('Composer not installed or not set in system eviroment');
            }
        }
        return $this->command;
    }

}
