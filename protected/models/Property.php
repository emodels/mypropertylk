<?php

/**
 * This is the model class for table "property".
 *
 * The followings are the available columns in table 'property':
 * @property integer $pid
 * @property integer $propcondition
 * @property integer $owner
 * @property integer $agent
 * @property integer $otheragent
 * @property double $weeklyrent
 * @property double $monthlyrent
 * @property double $securebond
 * @property double $price
 * @property integer $dispalyprice
 * @property string $availabledate
 * @property string $vendorname
 * @property string $vendoremail
 * @property string $vendorphone
 * @property integer $sendemail
 * @property string $unitnum
 * @property string $lotnum
 * @property string $number
 * @property string $streetaddress
 * @property string $areaname
 * @property string $townname
 * @property integer $hidestreetaddress
 * @property integer $district
 * @property integer $province
 * @property integer $bedrooms
 * @property integer $bathrooms
 * @property integer $ensuites
 * @property integer $toilets
 * @property integer $parkgaragespaces
 * @property integer $parkcarpetspaces
 * @property integer $parkopenspaces
 * @property integer $livingarea
 * @property integer $housesize
 * @property integer $housesquares
 * @property integer $landsize
 * @property integer $landsquares
 * @property integer $floorarea
 * @property integer $floorsquares
 * @property string $tenuretype
 * @property string $building
 * @property integer $parkingspaces
 * @property string $parkcomment
 * @property string $zoning
 * @property string $outgoings
 * @property integer $eer
 * @property integer $balcony
 * @property integer $deck
 * @property integer $oea
 * @property integer $shed
 * @property integer $remotegarage
 * @property integer $swimpool
 * @property integer $courtyard
 * @property integer $fullyfenced
 * @property integer $outsidespa
 * @property integer $securepark
 * @property integer $tenniscourt
 * @property integer $spabovroundeg
 * @property integer $alarmsys
 * @property integer $biltinwardrobes
 * @property integer $dvs
 * @property integer $gym
 * @property integer $intercom
 * @property integer $rumpusroom
 * @property integer $workshop
 * @property integer $broadbandinternet
 * @property integer $dishwasher
 * @property integer $floorboards
 * @property integer $insidespa
 * @property integer $paytv
 * @property integer $study
 * @property integer $ac
 * @property integer $heating
 * @property integer $cooling
 * @property integer $solarpower
 * @property integer $solarhotwater
 * @property integer $watertank
 * @property string $otherfeatures
 * @property string $headline
 * @property string $desc
 * @property string $vediourl
 * @property string $onlinetour1
 * @property string $onlinetour2
 * @property string $entrydate
 * @property integer $status
 * @property integer $type
 * @property integer $pricetype
 *
 * The followings are the available model relations:
 * @property Inspecttime[] $inspecttimes
 * @property Pricelist $pricetype0
 * @property User $agent0
 * @property Province $province0
 * @property District $district0
 * @property Propertyimages[] $propertyimages
 * @property Propertytyperelation[] $propertytyperelations
 * @property Watchlist[] $watchlists
 */
class Property extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Property the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'property';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('propcondition, owner, agent, otheragent, weeklyrent, monthlyrent, securebond, price, dispalyprice, availabledate, vendorname, vendoremail, vendorphone, sendemail, unitnum, lotnum, number, streetaddress, areaname, townname, hidestreetaddress, district, province, bedrooms, bathrooms, ensuites, toilets, parkgaragespaces, parkcarpetspaces, parkopenspaces, livingarea, housesize, housesquares, landsize, landsquares, floorarea, floorsquares, tenuretype, building, parkingspaces, parkcomment, zoning, outgoings, eer, balcony, deck, oea, shed, remotegarage, swimpool, courtyard, fullyfenced, outsidespa, securepark, tenniscourt, spabovroundeg, alarmsys, biltinwardrobes, dvs, gym, intercom, rumpusroom, workshop, broadbandinternet, dishwasher, floorboards, insidespa, paytv, study, ac, heating, cooling, solarpower, solarhotwater, watertank, otherfeatures, headline, desc, vediourl, onlinetour1, onlinetour2, entrydate, status, type, pricetype', 'required'),
			array('propcondition, owner, agent, otheragent, dispalyprice, sendemail, hidestreetaddress, district, province, bedrooms, bathrooms, ensuites, toilets, parkgaragespaces, parkcarpetspaces, parkopenspaces, livingarea, housesize, housesquares, landsize, landsquares, floorarea, floorsquares, parkingspaces, eer, balcony, deck, oea, shed, remotegarage, swimpool, courtyard, fullyfenced, outsidespa, securepark, tenniscourt, spabovroundeg, alarmsys, biltinwardrobes, dvs, gym, intercom, rumpusroom, workshop, broadbandinternet, dishwasher, floorboards, insidespa, paytv, study, ac, heating, cooling, solarpower, solarhotwater, watertank, status, type, pricetype', 'numerical', 'integerOnly'=>true),
			array('weeklyrent, monthlyrent, securebond, price', 'numerical'),
			array('vendorname, vendoremail, vendorphone, streetaddress, areaname, townname, tenuretype, building, parkcomment, zoning, outgoings, otherfeatures, headline', 'length', 'max'=>200),
			array('unitnum, lotnum, number', 'length', 'max'=>100),
			array('vediourl, onlinetour1, onlinetour2', 'length', 'max'=>500),
            array('vendoremail', 'email'),
            array('vendorphone', 'match', 'pattern' => '/^\+?[0-9]/', 'message' => 'Not a Valid phone number'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pid, propcondition, owner, agent, otheragent, weeklyrent, monthlyrent, securebond, price, dispalyprice, availabledate, vendorname, vendoremail, vendorphone, sendemail, unitnum, lotnum, number, streetaddress, areaname, townname, hidestreetaddress, district, province, bedrooms, bathrooms, ensuites, toilets, parkgaragespaces, parkcarpetspaces, parkopenspaces, livingarea, housesize, housesquares, landsize, landsquares, floorarea, floorsquares, tenuretype, building, parkingspaces, parkcomment, zoning, outgoings, eer, balcony, deck, oea, shed, remotegarage, swimpool, courtyard, fullyfenced, outsidespa, securepark, tenniscourt, spabovroundeg, alarmsys, biltinwardrobes, dvs, gym, intercom, rumpusroom, workshop, broadbandinternet, dishwasher, floorboards, insidespa, paytv, study, ac, heating, cooling, solarpower, solarhotwater, watertank, otherfeatures, headline, desc, vediourl, onlinetour1, onlinetour2, entrydate, status, type, pricetype', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'inspecttimes' => array(self::HAS_MANY, 'Inspecttime', 'property'),
			'pricetype0' => array(self::BELONGS_TO, 'Pricelist', 'pricetype'),
			'agent0' => array(self::BELONGS_TO, 'User', 'agent'),
			'province0' => array(self::BELONGS_TO, 'Province', 'province'),
			'district0' => array(self::BELONGS_TO, 'District', 'district'),
			'propertyimages' => array(self::HAS_MANY, 'Propertyimages', 'propertyid'),
			'propertytyperelations' => array(self::HAS_MANY, 'Propertytyperelation', 'propertyid'),
			'watchlists' => array(self::HAS_MANY, 'Watchlist', 'propertyid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pid' => 'Pid',
			'propcondition' => 'Propcondition',
			'owner' => 'Owner',
			'agent' => 'Agent',
			'otheragent' => 'Otheragent',
			'weeklyrent' => 'Weeklyrent',
			'monthlyrent' => 'Monthlyrent',
			'securebond' => 'Securebond',
			'price' => 'Price',
			'dispalyprice' => 'Dispalyprice',
			'availabledate' => 'Availabledate',
			'vendorname' => 'Vendorname',
			'vendoremail' => 'Vendoremail',
			'vendorphone' => 'Vendorphone',
			'sendemail' => 'Sendemail',
			'unitnum' => 'Unitnum',
			'lotnum' => 'Lotnum',
			'number' => 'Number',
			'streetaddress' => 'Streetaddress',
			'areaname' => 'Areaname',
			'townname' => 'Townname',
			'hidestreetaddress' => 'Hidestreetaddress',
			'district' => 'District',
			'province' => 'Province',
			'bedrooms' => 'Bedrooms',
			'bathrooms' => 'Bathrooms',
			'ensuites' => 'Ensuites',
			'toilets' => 'Toilets',
			'parkgaragespaces' => 'Parkgaragespaces',
			'parkcarpetspaces' => 'Parkcarpetspaces',
			'parkopenspaces' => 'Parkopenspaces',
			'livingarea' => 'Livingarea',
			'housesize' => 'Housesize',
			'housesquares' => 'Housesquares',
			'landsize' => 'Landsize',
			'landsquares' => 'Landsquares',
			'floorarea' => 'Floorarea',
			'floorsquares' => 'Floorsquares',
			'tenuretype' => 'Tenuretype',
			'building' => 'Building',
			'parkingspaces' => 'Parkingspaces',
			'parkcomment' => 'Parkcomment',
			'zoning' => 'Zoning',
			'outgoings' => 'Outgoings',
			'eer' => 'Eer',
			'balcony' => 'Balcony',
			'deck' => 'Deck',
			'oea' => 'Oea',
			'shed' => 'Shed',
			'remotegarage' => 'Remotegarage',
			'swimpool' => 'Swimpool',
			'courtyard' => 'Courtyard',
			'fullyfenced' => 'Fullyfenced',
			'outsidespa' => 'Outsidespa',
			'securepark' => 'Securepark',
			'tenniscourt' => 'Tenniscourt',
			'spabovroundeg' => 'Spabovroundeg',
			'alarmsys' => 'Alarmsys',
			'biltinwardrobes' => 'Biltinwardrobes',
			'dvs' => 'Dvs',
			'gym' => 'Gym',
			'intercom' => 'Intercom',
			'rumpusroom' => 'Rumpusroom',
			'workshop' => 'Workshop',
			'broadbandinternet' => 'Broadbandinternet',
			'dishwasher' => 'Dishwasher',
			'floorboards' => 'Floorboards',
			'insidespa' => 'Insidespa',
			'paytv' => 'Paytv',
			'study' => 'Study',
			'ac' => 'Ac',
			'heating' => 'Heating',
			'cooling' => 'Cooling',
			'solarpower' => 'Solarpower',
			'solarhotwater' => 'Solarhotwater',
			'watertank' => 'Watertank',
			'otherfeatures' => 'Otherfeatures',
			'headline' => 'Headline',
			'desc' => 'Desc',
			'vediourl' => 'Vediourl',
			'onlinetour1' => 'Onlinetour1',
			'onlinetour2' => 'Onlinetour2',
			'entrydate' => 'Entrydate',
			'status' => 'Status',
			'type' => 'Type',
			'pricetype' => 'Pricetype',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('pid',$this->pid);
		$criteria->compare('propcondition',$this->propcondition);
		$criteria->compare('owner',$this->owner);
		$criteria->compare('agent',$this->agent);
		$criteria->compare('otheragent',$this->otheragent);
		$criteria->compare('weeklyrent',$this->weeklyrent);
		$criteria->compare('monthlyrent',$this->monthlyrent);
		$criteria->compare('securebond',$this->securebond);
		$criteria->compare('price',$this->price);
		$criteria->compare('dispalyprice',$this->dispalyprice);
		$criteria->compare('availabledate',$this->availabledate,true);
		$criteria->compare('vendorname',$this->vendorname,true);
		$criteria->compare('vendoremail',$this->vendoremail,true);
		$criteria->compare('vendorphone',$this->vendorphone,true);
		$criteria->compare('sendemail',$this->sendemail);
		$criteria->compare('unitnum',$this->unitnum,true);
		$criteria->compare('lotnum',$this->lotnum,true);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('streetaddress',$this->streetaddress,true);
		$criteria->compare('areaname',$this->areaname,true);
		$criteria->compare('townname',$this->townname,true);
		$criteria->compare('hidestreetaddress',$this->hidestreetaddress);
		$criteria->compare('district',$this->district);
		$criteria->compare('province',$this->province);
		$criteria->compare('bedrooms',$this->bedrooms);
		$criteria->compare('bathrooms',$this->bathrooms);
		$criteria->compare('ensuites',$this->ensuites);
		$criteria->compare('toilets',$this->toilets);
		$criteria->compare('parkgaragespaces',$this->parkgaragespaces);
		$criteria->compare('parkcarpetspaces',$this->parkcarpetspaces);
		$criteria->compare('parkopenspaces',$this->parkopenspaces);
		$criteria->compare('livingarea',$this->livingarea);
		$criteria->compare('housesize',$this->housesize);
		$criteria->compare('housesquares',$this->housesquares);
		$criteria->compare('landsize',$this->landsize);
		$criteria->compare('landsquares',$this->landsquares);
		$criteria->compare('floorarea',$this->floorarea);
		$criteria->compare('floorsquares',$this->floorsquares);
		$criteria->compare('tenuretype',$this->tenuretype,true);
		$criteria->compare('building',$this->building,true);
		$criteria->compare('parkingspaces',$this->parkingspaces);
		$criteria->compare('parkcomment',$this->parkcomment,true);
		$criteria->compare('zoning',$this->zoning,true);
		$criteria->compare('outgoings',$this->outgoings,true);
		$criteria->compare('eer',$this->eer);
		$criteria->compare('balcony',$this->balcony);
		$criteria->compare('deck',$this->deck);
		$criteria->compare('oea',$this->oea);
		$criteria->compare('shed',$this->shed);
		$criteria->compare('remotegarage',$this->remotegarage);
		$criteria->compare('swimpool',$this->swimpool);
		$criteria->compare('courtyard',$this->courtyard);
		$criteria->compare('fullyfenced',$this->fullyfenced);
		$criteria->compare('outsidespa',$this->outsidespa);
		$criteria->compare('securepark',$this->securepark);
		$criteria->compare('tenniscourt',$this->tenniscourt);
		$criteria->compare('spabovroundeg',$this->spabovroundeg);
		$criteria->compare('alarmsys',$this->alarmsys);
		$criteria->compare('biltinwardrobes',$this->biltinwardrobes);
		$criteria->compare('dvs',$this->dvs);
		$criteria->compare('gym',$this->gym);
		$criteria->compare('intercom',$this->intercom);
		$criteria->compare('rumpusroom',$this->rumpusroom);
		$criteria->compare('workshop',$this->workshop);
		$criteria->compare('broadbandinternet',$this->broadbandinternet);
		$criteria->compare('dishwasher',$this->dishwasher);
		$criteria->compare('floorboards',$this->floorboards);
		$criteria->compare('insidespa',$this->insidespa);
		$criteria->compare('paytv',$this->paytv);
		$criteria->compare('study',$this->study);
		$criteria->compare('ac',$this->ac);
		$criteria->compare('heating',$this->heating);
		$criteria->compare('cooling',$this->cooling);
		$criteria->compare('solarpower',$this->solarpower);
		$criteria->compare('solarhotwater',$this->solarhotwater);
		$criteria->compare('watertank',$this->watertank);
		$criteria->compare('otherfeatures',$this->otherfeatures,true);
		$criteria->compare('headline',$this->headline,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('vediourl',$this->vediourl,true);
		$criteria->compare('onlinetour1',$this->onlinetour1,true);
		$criteria->compare('onlinetour2',$this->onlinetour2,true);
		$criteria->compare('entrydate',$this->entrydate,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('type',$this->type);
		$criteria->compare('pricetype',$this->pricetype);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}