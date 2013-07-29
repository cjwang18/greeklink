<?php
/* @var $this ProfileController */
/* @var $userData Users */
/* @var $profileData Profile */
?>

<div class="box centerAlign">
	<div class="divProfileCenter">	
		<section class="ac-container divShadow">
			<div>
				<input id="ac-1" name="accordion-1" type="checkbox" checked />
				<label for="ac-1">GREEK</label>
				<article class="ac-large normal">
					<p>
						<b><?php echo CHtml::encode($userData->getAttributeLabel('organization')); ?>:</b>
						<?php echo CHtml::encode($userData->organizationRel->name); ?>
						<br />

						<b><?php echo CHtml::encode($profileData->getAttributeLabel('chapter')); ?>:</b>
						<?php echo CHtml::encode($profileData->chapter); ?>
						<br />

						<b><?php echo CHtml::encode($userData->getAttributeLabel('initiationYear')); ?>:</b>
						<?php echo CHtml::encode($userData->initiationYear); ?>
						<br />

						<?php
							if ($profileData->profilesPositions) {
								echo '<b>Positions:</b>';
								foreach ($profileData->profilesPositions as $p) {
									$beginDates = CHtml::encode($p->beginSemester).' '.CHtml::encode($p->beginYear).' - ';
									if ($p->present == 1)
										$dates = $beginDates.'Present';
									else
										$dates = $beginDates.CHtml::encode($p->endSemester).' '.CHtml::encode($p->endYear);
									echo '<br>'.$dates.' | '.CHtml::encode($p->title).' - '.CHtml::encode($p->description);
								}
								echo '<br>';
							}
						?>

						<?php
							if ($profileData->profilesCommitteeInvolvements) {
								echo '<b>Committee Involvement:</b>';
								foreach ($profileData->profilesCommitteeInvolvements as $c) {
									$beginDates = CHtml::encode($c->beginSemester).' '.CHtml::encode($c->beginYear).' - ';
									if ($c->present == 1)
										$dates = $beginDates.'Present';
									else
										$dates = $beginDates.CHtml::encode($c->endSemester).' '.CHtml::encode($c->endYear);
									echo '<br>'.$dates.' | '.CHtml::encode($c->name);
								}
								echo '<br>';
							}
						?>

						<b><?php echo CHtml::encode($profileData->getAttributeLabel('intramural')); ?>:</b>
						<?php echo CHtml::encode($profileData->intramural); ?>
						<br />

						<?php
							if ($profileData->profilesFraternalFamilies) {
								echo '<b>Fraternal Family:</b>';
								foreach ($profileData->profilesFraternalFamilies as $f) {
									echo '<br>'.CHtml::encode($f->user->name).' - '.CHtml::encode($f->type);
								}
								echo '<br>';
							}
						?>
					</p>
				</article>
			</div>
			<div>
				<input id="ac-2" name="accordion-1" type="checkbox" />
				<label for="ac-2">PERSONAL</label>
				<article class="ac-large">
					<p>
						<b><?php echo CHtml::encode($profileData->getAttributeLabel('currentCity')); ?>:</b>
						<?php echo CHtml::encode($profileData->currentCity); ?>
						<br />

						<b><?php echo CHtml::encode($profileData->getAttributeLabel('hometown')); ?>:</b>
						<?php echo CHtml::encode($profileData->hometown); ?>
						<br />

						<b><?php echo CHtml::encode($userData->getAttributeLabel('birthday')); ?>:</b>
						<?php echo Yii::app()->dateFormatter->formatDateTime($userData->birthday, 'long', false); ?>
						<br />

						<b><?php echo CHtml::encode($userData->getAttributeLabel('gender')); ?>:</b>
						<?php 
							if ($userData->gender==='m')
								echo CHtml::encode('Male');
							else
								echo CHtml::encode('Female');
						?>
						<br />

						<b><?php echo CHtml::encode($profileData->getAttributeLabel('relationship')); ?>:</b>
						<?php echo CHtml::encode($profileData->relationship); ?>
						<br />

						<b><?php echo CHtml::encode($profileData->getAttributeLabel('interests')); ?>:</b>
						<?php echo CHtml::encode($profileData->interests); ?>
						<br />

						<b><?php echo CHtml::encode($profileData->getAttributeLabel('music')); ?>:</b>
						<?php echo CHtml::encode($profileData->music); ?>
						<br />

						<b><?php echo CHtml::encode($profileData->getAttributeLabel('movies')); ?>:</b>
						<?php echo CHtml::encode($profileData->movies); ?>
						<br />

						<b><?php echo CHtml::encode($profileData->getAttributeLabel('tv')); ?>:</b>
						<?php echo CHtml::encode($profileData->tv); ?>
						<br />

						<b><?php echo CHtml::encode($profileData->getAttributeLabel('books')); ?>:</b>
						<?php echo CHtml::encode($profileData->books); ?>
						<br />

						<b><?php echo CHtml::encode($profileData->getAttributeLabel('games')); ?>:</b>
						<?php echo CHtml::encode($profileData->games); ?>
					</p>
				</article>
			</div>
			<div>
				<input id="ac-3" name="accordion-1" type="checkbox" />
				<label for="ac-3">CONTACT</label>
				<article class="ac-large">
					<p>
						<b><?php echo CHtml::encode($userData->getAttributeLabel('email')); ?>:</b>
						<?php echo CHtml::encode($userData->email); ?>
						<br />

						<?php
							if ($profileData->phone) {
								echo '<b>'.CHtml::encode($profileData->getAttributeLabel('phone')).':</b>';
								echo CHtml::encode($profileData->phone);
								echo '<br>';
							} 
						?>

						<b><?php
							if ($profileData->facebook) {
								echo Chtml::link('Facebook', $profileData->facebook, array('target'=>'_blank'));
								echo '<br>';
							}
						?></b>

						<b><?php
							if ($profileData->twitter) {
								echo Chtml::link('Twitter', $profileData->twitter, array('target'=>'_blank'));
								echo '<br>';
							}
						?></b>

						<b><?php
							if ($profileData->website) {
								echo Chtml::link('Website', $profileData->website, array('target'=>'_blank'));
								echo '<br>';
							}
						?></b>
					</p>
				</article>
			</div>
			<div>
				<input id="ac-4" name="accordion-1" type="checkbox" />
				<label for="ac-4">EDUCATION</label>
				<article class="ac-large">
					<p>
						<b><?php echo CHtml::encode($userData->getAttributeLabel('university')); ?>:</b>
						<?php echo CHtml::encode($userData->universityRel->name); ?>
						<br />

						<b><?php echo CHtml::encode('Graduation Date (Month/Year)'); ?>:</b>
						<?php echo CHtml::encode($profileData->graduationMonth).' '.CHtml::encode($profileData->graduationYear); ?>
						<br />

						<b><?php echo CHtml::encode($profileData->getAttributeLabel('gpa')); ?>:</b>
						<?php echo CHtml::encode($profileData->gpa); ?>
						<br />

						<b><?php echo CHtml::encode('Concentration(s)'); ?>:</b>
						<?php
							foreach ($profileData->profilesConcentrations as $c) {
								echo '<br>'.CHtml::encode($c->concentration);
							}
						?>
						<br>

						<b><?php echo CHtml::encode($profileData->getAttributeLabel('honors')); ?>:</b>
						<?php echo CHtml::encode($profileData->honors); ?>
						<br />

						<b><?php echo CHtml::encode($profileData->getAttributeLabel('relevantCoursework')); ?>:</b>
						<?php echo CHtml::encode($profileData->relevantCoursework); ?>
						<br />
					</p>
				</article>
			</div>
			<div>
				<input id="ac-5" name="accordion-1" type="checkbox" />
				<label for="ac-5">WORK EXPERIENCE</label>
				<article class="ac-large">
					<p>
						<?php
							if ($profileData->profilesWorkExperiences) {
								foreach ($profileData->profilesWorkExperiences as $w) {
									echo '<b>'.CHtml::encode($w->name).'</b>: '.CHtml::encode($w->description).'<br>';
								}
							}
						?>
					</p>
				</article>
			</div>
			<div>
				<input id="ac-6" name="accordion-1" type="checkbox" />
				<label for="ac-6">ACTIVITIES</label>
				<article class="ac-large">
					<p>
						<?php
							if ($profileData->profilesActivities) {
								foreach ($profileData->profilesActivities as $a) {
									echo '<b>'.CHtml::encode($a->name).'</b>: '.CHtml::encode($a->description).'<br>';
								}
							}
						?>
					</p>
				</article>
			</div>
			<div>
				<input id="ac-7" name="accordion-1" type="checkbox" />
				<label for="ac-7">SKILLS</label>
				<article class="ac-large">
					<p>
						<?php
							if ($profileData->profilesSkills) {
								foreach ($profileData->profilesSkills as $s) {
									echo '<b>'.CHtml::encode($s->category).'</b>: '.CHtml::encode($s->skills).'<br>';
								}
							}
						?>
					</p>
				</article>
			</div>
		</section>
	</div>

	<br><br>
</div>