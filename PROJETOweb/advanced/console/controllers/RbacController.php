<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // LIMPA todas as roles anteriores
        $auth->removeAll();

         // PERMISSÕES«

        // PERMISSÃO DE ACESSO AO BACKEND
        $accessBackend = $auth->createPermission('accessBackend');
        $accessBackend->description = 'Acesso às áreas de gestão (Backend)';
        $auth->add($accessBackend);

        // Backoffice
        $manageGyms = $auth->createPermission('manageGyms');
        $manageGyms->description = 'Gerir diferentes ginásios';
        $auth->add($manageGyms);

        $manageStaff = $auth->createPermission('manageStaff');
        $manageStaff->description = 'Gerir o staff geral';
        $auth->add($manageStaff);

        // Personal Trainer
        $manageExercises = $auth->createPermission('manageExercises');
        $manageExercises->description = 'Gerir exercícios';
        $auth->add($manageExercises);

        $manageGroupClasses = $auth->createPermission('manageGroupClasses');
        $manageGroupClasses->description = 'Gerir aulas de grupo';
        $auth->add($manageGroupClasses);

        $manageTrainingPlans = $auth->createPermission('manageTrainingPlans');
        $manageTrainingPlans->description = 'Gerir planos de treino dos clientes';
        $auth->add($manageTrainingPlans);

        $managePhysicalEvaluations = $auth->createPermission('managePhysicalEvaluations');
        $managePhysicalEvaluations->description = 'Gerir avaliações físicas dos clientes';
        $auth->add($managePhysicalEvaluations);

        // Nutricionista
        $manageDietPlans = $auth->createPermission('manageDietPlans');
        $manageDietPlans->description = 'Gerir planos alimentares dos clientes';
        $auth->add($manageDietPlans);

        $accessPhysicalEvaluations = $auth->createPermission('accessPhysicalEvaluations');
        $accessPhysicalEvaluations->description = 'Aceder às avaliações físicas dos clientes';
        $auth->add($accessPhysicalEvaluations);

        // Cliente
        $viewTrainingPlans = $auth->createPermission('viewTrainingPlans');
        $viewTrainingPlans->description = 'Acesso read-only aos planos de treino';
        $auth->add($viewTrainingPlans);

        $viewDietPlans = $auth->createPermission('viewDietPlans');
        $viewDietPlans->description = 'Acesso read-only aos planos alimentares';
        $auth->add($viewDietPlans);

        $bookGroupClasses = $auth->createPermission('bookGroupClasses');
        $bookGroupClasses->description = 'Fazer reservas para aulas de grupo';
        $auth->add($bookGroupClasses);

        $sendInAppMessages = $auth->createPermission('sendInAppMessages');
        $sendInAppMessages->description = 'Enviar mensagens In-App para PTs ou nutricionistas';
        $auth->add($sendInAppMessages);

        $viewInvoices = $auth->createPermission('viewInvoices');
        $viewInvoices->description = 'Consultar faturas';
        $auth->add($viewInvoices);

        // ROLES



        // PERSONAL TRAINER
        $personalTrainer = $auth->createRole('personal_trainer');
        $auth->add($personalTrainer);
        $auth->addChild($personalTrainer, $manageExercises);
        $auth->addChild($personalTrainer, $manageGroupClasses);
        $auth->addChild($personalTrainer, $manageTrainingPlans);
        $auth->addChild($personalTrainer, $managePhysicalEvaluations);
        $auth->addChild($personalTrainer, $accessBackend);

        // NUTRICIONISTA
        $nutricionista = $auth->createRole('nutricionista');
        $auth->add($nutricionista);
        $auth->addChild($nutricionista, $manageDietPlans);
        $auth->addChild($nutricionista, $accessPhysicalEvaluations);
        $auth->addChild($nutricionista, $accessBackend);

        // CLIENTE
        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);
        $auth->addChild($cliente, $viewTrainingPlans);
        $auth->addChild($cliente, $viewDietPlans);
        $auth->addChild($cliente, $bookGroupClasses);
        $auth->addChild($cliente, $sendInAppMessages);
        $auth->addChild($cliente, $viewInvoices);

        // SYS ADMIN
        $sysAdmin = $auth->createRole('sys_admin');
        $auth->add($sysAdmin);
        $auth->addChild($sysAdmin, $manageGyms);
        $auth->addChild($sysAdmin, $manageStaff);
        $auth->addChild($sysAdmin, $personalTrainer);
        $auth->addChild($sysAdmin, $nutricionista);
        $auth->addChild($sysAdmin, $cliente);
        $auth->addChild($sysAdmin, $accessBackend);

        $auth->assign($sysAdmin, 1);
        $auth->assign($cliente, 3);

    }
}