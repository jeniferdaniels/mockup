<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Video player</title>
	<style>
		.sidebar-container-right{
			width:50%;			
		}
	</style>
  </head>
  <body>
  
	
	<div id="video-container" class="video-container-left">
		<div id="jwobj"></div>
	</div>
	
	<div id="sidebar-container" class="sidebar-container-right">
		<div class="lang-en tab-title">Transcript</div>
	</div>

<div class="tab-content">
	<div class="tab-content-overflow" style="height: 500px; overflow: auto;" id="transcriptBox">
		<div class="lang-en">
		<span onclick="videoSeek('0');" style="cursor: pointer;" id="caption-en-1" class="caption">
		Hi, welcome to the course on Big Data.
		</span>
		<span onclick="videoSeek('5.066');" style="cursor: pointer;" id="caption-en-2" class="caption">
		My name is Ravi Mukkamala.
		</span>
		<span onclick="videoSeek('7.533');" style="cursor: pointer;" id="caption-en-3" class="caption">
		I'm a professor in Computer Science at Old Dominion University.
		</span>
		<span onclick="videoSeek('11.966');" style="cursor: pointer;" id="caption-en-4" class="caption">
		We are very pleased to offer this course to Colombia.
		</span>
		<span onclick="videoSeek('15.966');" style="cursor: pointer;" id="caption-en-5" class="caption">
		<br><br>This is a first lecture. The lecture has four parts.
		</span>
		<span onclick="videoSeek('19.266');" style="cursor: pointer;" id="caption-en-6" class="caption">
		At the end of each part, you'll have a multiple choice question to answer.
		</span>
		<span onclick="videoSeek('24.433');" style="cursor: pointer;" id="caption-en-7" class="caption">
		Let's start with the course.
		</span>
		<span onclick="videoSeek('30.5');" style="cursor: pointer;" id="caption-en-8" class="caption">
		First, let's know what is big data?
		</span>
		<span onclick="videoSeek('33.366');" style="cursor: pointer;" id="caption-en-9" class="caption">
		One of the first definitions of big data is that the large volume of data that we have to handle, that is how the word big has come in the picture.
		</span>
		<span onclick="videoSeek('42.5');" style="cursor: pointer;" id="caption-en-10" class="caption">
		And this is when, Google has introduced several technologies, such as MapReduce and Hadoop.
		</span>
		<span onclick="videoSeek('52.733');" style="cursor: pointer;" id="caption-en-11" class="caption">
		However, as this evolution has progressed, today, big data is more than having large volume.
		</span>
		<span onclick="videoSeek('60.1');" style="cursor: pointer;" id="caption-en-12" class="caption">
		For it's more about understanding and seeing associations or relations from data that we otherwise cannot see in small data context.
		</span>
		<span onclick="videoSeek('70.3');" style="cursor: pointer;" id="caption-en-13" class="caption">
		And therefore, it has brought about four shifts in the way we think about big data.
		</span>
		<span onclick="videoSeek('78.833');" style="cursor: pointer;" id="caption-en-14" class="caption">
		First shift is, all and not just a sample.
		</span>
		<span onclick="videoSeek('82.7');" style="cursor: pointer;" id="caption-en-15" class="caption">
		Traditionally, statisticians have taught that it's just enough to have a small sample of data from which they can build a model.
		</span>
		<span onclick="videoSeek('91.6');" style="cursor: pointer;" id="caption-en-16" class="caption">
		So, even though there was large amount of data that was available, they picked and chose the data that they would like to use to build a model, but this definitely, this model of choosing a sample has now shifted to taking all data to build the model.
		</span>
		<span onclick="videoSeek('110.833');" style="cursor: pointer;" id="caption-en-17" class="caption">
		The second shift is handling messy or noisy data.
		</span>
		<span onclick="videoSeek('115.733');" style="cursor: pointer;" id="caption-en-18" class="caption">
		Earlier, traditionally, messy or noisy data was not good, and it was thrown out.
		</span>
		<span onclick="videoSeek('122.266');" style="cursor: pointer;" id="caption-en-19" class="caption">
		And the statisticians believed that we need to have perfect data to build a model.
		</span>
		<span onclick="videoSeek('128.2');" style="cursor: pointer;" id="caption-en-20" class="caption">
		However, that paradigm has changed, and in the big data context, we would like to accept all data, whether it is messy or noisy.
		</span>
		<span onclick="videoSeek('143.1');" style="cursor: pointer;" id="caption-en-21" class="caption">
		The third shift is correlation and not causality.
		</span>
		<span onclick="videoSeek('148');" style="cursor: pointer;" id="caption-en-22" class="caption">
		Once again, typically traditionally, people have come up with a hypothesis and the data model was used to prove or disprove the hypothesis.
		</span>
		<span onclick="videoSeek('160.533');" style="cursor: pointer;" id="caption-en-23" class="caption">
		But today, however, the big data context, the shift is we are more interested in finding correlations among the variables, and not necessarily causality that is known ahead of time.
		</span>
		<span onclick="videoSeek('174.4');" style="cursor: pointer;" id="caption-en-24" class="caption">
		And because of this, we might find a lot of unexpected findings which are otherwise not possible in the small data context.
		</span>
		<span onclick="videoSeek('186.6');" style="cursor: pointer;" id="caption-en-25" class="caption">
		The next shift is variety of data.
		</span>
		<span onclick="videoSeek('190.133');" style="cursor: pointer;" id="caption-en-26" class="caption">
		Once again, traditionally, the data was available in the form of a table.
		</span>
		<span onclick="videoSeek('194.7');" style="cursor: pointer;" id="caption-en-27" class="caption">
		A very clean, and mostly numerical data, and sometime categorical data.
		</span>
		<span onclick="videoSeek('200');" style="cursor: pointer;" id="caption-en-28" class="caption">
		And this is what was analyzed to build the model, but today, however, the data has lots of varieties.
		</span>
		<span onclick="videoSeek('207.2');" style="cursor: pointer;" id="caption-en-29" class="caption">
		It could be textual, numerical, categorical, 3D data, audio and video, unstructured text, and structured data.
		</span>
		<span onclick="videoSeek('217.4');" style="cursor: pointer;" id="caption-en-30" class="caption">
		So, the big data problems have to handle this many varieties of data, both unstructured and structured.
		</span>
		<span onclick="videoSeek('229.4');" style="cursor: pointer;" id="caption-en-31" class="caption">
		Let's briefly look at, what are some of the challenges that big data researchers or analytics have to handle.
		</span>
		<span onclick="videoSeek('236.833');" style="cursor: pointer;" id="caption-en-32" class="caption">
		As we mentioned, the first one is dealing with unstructured and structured data.
		</span>
		<span onclick="videoSeek('241.866');" style="cursor: pointer;" id="caption-en-33" class="caption">
		For example, a hotel firm is analyzing the feelings of customers who are at the front desk to know what kind of service is being offered to them, and this is done through video analytics.
		</span>
		<span onclick="videoSeek('254.733');" style="cursor: pointer;" id="caption-en-34" class="caption">
		This is very unusual in the traditional context.
		</span>
		<span onclick="videoSeek('259.833');" style="cursor: pointer;" id="caption-en-35" class="caption">
		And similarly for example today, we access the bank through several means, for example we actually go to the teller, we may do through internet, we may through iPods, we may through our cell phones.
		</span>
		<span onclick="videoSeek('274.766');" style="cursor: pointer;" id="caption-en-36" class="caption">
		And therefore the banks are also, a retail bank for example, is trying to analyze getting data from all this and finding out what kind of response are all these people from different devices are being offered and what is their response.
		</span>
		<span onclick="videoSeek('293.966');" style="cursor: pointer;" id="caption-en-37" class="caption">
		And the next challenge, of course, is high data rate.
		</span>
		<span onclick="videoSeek('297.633');" style="cursor: pointer;" id="caption-en-38" class="caption">
		The data could be coming at very high data rates into applications and therefore we need to have enough computing power to process the data, and we need to have lots of storage to store the data.
		</span>
		<span onclick="videoSeek('313.5');" style="cursor: pointer;" id="caption-en-39" class="caption">
		And in summary, there are four challenges, referred to as four Vs.
		</span>
		<span onclick="videoSeek('318.966');" style="cursor: pointer;" id="caption-en-40" class="caption">
		One is of volume.
		</span>
		<span onclick="videoSeek('320.833');" style="cursor: pointer;" id="caption-en-41" class="caption">
		Data could be in terabytes, that is 1000 to the power of 4 bytes to geopbytes 1024 to the power of 10 bytes,  and velocity, high speed of data in and out, for example a lot of data coming from satellites and so many other devices, sensors it is coming at high rate.
		</span>
		<span onclick="videoSeek('340.166');" style="cursor: pointer;" id="caption-en-42" class="caption">
		Third thing is, the variety, the different formats, unstructured and structured data, and finally the variability, that is data flows highly inconsistent.
		</span>
		<span onclick="videoSeek('351.3');" style="cursor: pointer;" id="caption-en-43" class="caption">
		For example, if there is a popular soccer game going on, then Twitter could have lots of data that's coming in.
		</span>
		<span onclick="videoSeek('358.333');" style="cursor: pointer;" id="caption-en-44" class="caption">
		And if there is no activity, there could be very little.
		</span>
		<span onclick="videoSeek('361.233');" style="cursor: pointer;" id="caption-en-45" class="caption">
		So it all depends, so the variability is very high, we cannot expect a constant rate of data to come.
		</span>
		<span onclick="videoSeek('367.833');" style="cursor: pointer;" id="caption-en-46" class="caption">
		Depending on the data source, we could have high variability in the way data is being generated.
		</span>
		<span onclick="videoSeek('375.1');" style="cursor: pointer;" id="caption-en-47" class="caption">
		And of course, because it is unstructured and could be messy and noisy, it may need some kind of cleansing, some linking of data coming from different sources and matching the data across systems.
		</span>
		<span onclick="videoSeek('388.5');" style="cursor: pointer;" id="caption-en-48" class="caption">
		So, this is an additional complexity that comes when we start analyzing big data.
		</span>
		<span onclick="videoSeek('395.8');" style="cursor: pointer;" id="caption-en-49" class="caption">
		Now, what are the data sources?
		</span>
		<span onclick="videoSeek('398.166');" style="cursor: pointer;" id="caption-en-50" class="caption">
		Where is this data coming from, you may be interested to know that, and one is transactional data, for example, we use almost each of every one of us, we use credit cards, for buying anything almost, for paying the bills we use credit cards.
		</span>
		<span onclick="videoSeek('412.733');" style="cursor: pointer;" id="caption-en-51" class="caption">
		If you go to a grocery store, we use credit cards.
		</span>
		<span onclick="videoSeek('415.866');" style="cursor: pointer;" id="caption-en-52" class="caption">
		And therefore, in each of this use of credit card, for example, is a transaction.
		</span>
		<span onclick="videoSeek('420.566');" style="cursor: pointer;" id="caption-en-53" class="caption">
		And so, we are really generating trillions of bytes of information about the customers, suppliers, and operations during this process.
		</span>
		<span onclick="videoSeek('433.5');" style="cursor: pointer;" id="caption-en-54" class="caption">
		And the sensors, today we may know it, or we may not know it.
		</span>
		<span onclick="videoSeek('437.433');" style="cursor: pointer;" id="caption-en-55" class="caption">
		Almost every device that we carry, or that we use, or that we see, has sensors that are transferring data that are collecting and transferring data.
		</span>
		<span onclick="videoSeek('447.4');" style="cursor: pointer;" id="caption-en-56" class="caption">
		For example, on the right, you see an energy meter, a power meter, that is actually generating, it has sensors and that keeps on telling the electric utility company how the particular household is using the electricity.
		</span>
		<span onclick="videoSeek('462.966');" style="cursor: pointer;" id="caption-en-57" class="caption">
		And similarly, every GPS device, mobile phones, automobiles, industrial machines, all of them have hundreds of sensors which we don't see, and all of them, without knowing us, are keeping on transporting information to their manufacturers.
		</span>
		<span onclick="videoSeek('481.6');" style="cursor: pointer;" id="caption-en-58" class="caption">
		For example, in the case of automobiles, they could be sending information continuously to the manufacturer.
		</span>
		<span onclick="videoSeek('492.3');" style="cursor: pointer;" id="caption-en-59" class="caption">
		And of course, we do lot of interactions, for example people, they use Twitter to post, they use Facebook, and then we use smartphones.
		</span>
		<span onclick="videoSeek('501.633');" style="cursor: pointer;" id="caption-en-60" class="caption">
		And all of these generate lots of data.
		</span>
		<span onclick="videoSeek('508.233');" style="cursor: pointer;" id="caption-en-61" class="caption">
		And of course you're all familiar with YouTube, and YouTube has a lot of multimedia and video, of course, again, generates lots and lots of data and video has to be analyzed down so if you want to use it as part of the big data.
		</span>
		<span onclick="videoSeek('522.3');" style="cursor: pointer;" id="caption-en-62" class="caption">
		So this is also another source of data, for the big data.
		</span>
		<span onclick="videoSeek('526.5');" style="cursor: pointer;" id="caption-en-63" class="caption">
		And human activities, for example, we communicate, we talk, we send e-mails, we browse, we buy, we share, and we search.
		</span>
		<span onclick="videoSeek('535.4');" style="cursor: pointer;" id="caption-en-64" class="caption">
		Believe it or not, every time you do a Google search, that information is actually being captured by Google and then it is being disseminated to lots of advertisers, for example, who are concerned, and who could be related to that.
		</span>
		<span onclick="videoSeek('551.1');" style="cursor: pointer;" id="caption-en-65" class="caption">
		And a lot of marketers also could be getting it, for example, if you were to search for insurance, automobile insurance, you do a Google search.
		</span>
		<span onclick="videoSeek('560.033');" style="cursor: pointer;" id="caption-en-66" class="caption">
		And after some time, you will start seeing advertisements from the insurance companies appearing on the screen and you will start wondering, you know, how did these insurance companies knew that I was searching on this?
		</span>
		<span onclick="videoSeek('574');" style="cursor: pointer;" id="caption-en-67" class="caption">
		And that is where this big data has come, where Google has actually processed the information that you are searching and sent, alerted the insurance companies or whoever it is enrolled in the search to say that there is interest of this particular customer to buy this product.
		</span>
		<span onclick="videoSeek('595.166');" style="cursor: pointer;" id="caption-en-68" class="caption">
		And again, once again, there's a big list, social networks generate data, internet users, administrative, hospital visits, and sales receipts.
		</span>
		<span onclick="videoSeek('604.166');" style="cursor: pointer;" id="caption-en-69" class="caption">
		Commercial cell phone usage, every time you call, every time actually as you are traveling, your cell phone is actually telling your cell phone company where you are, and that itself is information, and so on and so forth.
		</span>
		<span onclick="videoSeek('618.033');" style="cursor: pointer;" id="caption-en-70" class="caption">
		And health information, for example, electronic medical records are there.
		</span>
		<span onclick="videoSeek('621.833');" style="cursor: pointer;" id="caption-en-71" class="caption">
		There's a medical monitoring, for example, for the patient, lot of when the patient is in the critical care, for example, a lot of information is being generated and is also being analyzed, and satellites of course, and lots of lots of information.
		</span>
		<span onclick="videoSeek('637.866');" style="cursor: pointer;" id="caption-en-72" class="caption">
		And according to a survey about a year ago, 70% of data is stable data that is fixed, the traditional data is still 71%, the remaining 30% comes from lots of other sources.
		</span>
		<span onclick="videoSeek('656.8');" style="cursor: pointer;" id="caption-en-73" class="caption">
		For example, time series, stock price, and keeps on changing every five minutes and that becomes a time series.
		</span>
		<span onclick="videoSeek('664.933');" style="cursor: pointer;" id="caption-en-74" class="caption">
		And then we have transactions, texts, anonymous data, social network data, and so on and so forth.
		</span>
		<span onclick="videoSeek('670.966');" style="cursor: pointer;" id="caption-en-75" class="caption">
		Once again, this is not a static distribution, because as time progresses, we will have more and more of unstructured data coming, taking higher forms, but this is a year ago.
		</span>
		<span onclick="videoSeek('683.166');" style="cursor: pointer;" id="caption-en-76" class="caption">
		So, this gives you a summary of where the data is generated and what form it is taking.
		</span>
		<span onclick="videoSeek('689.766');" style="cursor: pointer;" id="caption-en-77" class="caption">
		Now, let's briefly look at some of the statistics which blows the mind.
		</span>
		<span onclick="videoSeek('695.066');" style="cursor: pointer;" id="caption-en-78" class="caption">
		Google for example, has more than one million petabytes, and one petabyte is one million gigabytes.
		</span>
		<span onclick="videoSeek('702.333');" style="cursor: pointer;" id="caption-en-79" class="caption">
		And it processes more than 24 petabytes of data per day.
		</span>
		<span onclick="videoSeek('707.033');" style="cursor: pointer;" id="caption-en-80" class="caption">
		And 32 billion searches are performed each month on Twitter.
		</span>
		<span onclick="videoSeek('711.666');" style="cursor: pointer;" id="caption-en-81" class="caption">
		More than 1 billion unique users visit YouTube each month.
		</span>
		<span onclick="videoSeek('715.9');" style="cursor: pointer;" id="caption-en-82" class="caption">
		And therefore you can see the magnanimity of the situation, the magnitude is very high, when we talk about big data it's really big.
		</span>
		<span onclick="videoSeek('726.633');" style="cursor: pointer;" id="caption-en-83" class="caption">
		Now the next question is, well, we have the source of data and it is definitely complex to handle this data, but the question is unless there is a benefit, nobody is really going to use this big data, the question is, who are the beneficiaries?
		</span>
		<span onclick="videoSeek('741.2');" style="cursor: pointer;" id="caption-en-84" class="caption">
		For whom are we building all the systems?
		</span>
		<span onclick="videoSeek('743.766');" style="cursor: pointer;" id="caption-en-85" class="caption">
		So, almost everybody actually, the answer almost everybody could be beneficiary.
		</span>
		<span onclick="videoSeek('748.8');" style="cursor: pointer;" id="caption-en-86" class="caption">
		For example, in the private sector a retailer using big data has, if they can use the data properly, they can increase their profits by about 60%.
		</span>
		<span onclick="videoSeek('763.6');" style="cursor: pointer;" id="caption-en-87" class="caption">
		And this is all a service, a consultant has done analysis and came up with this conclusions.
		</span>
		<span onclick="videoSeek('770.966');" style="cursor: pointer;" id="caption-en-88" class="caption">
		They found that European governments could save more than 100 billion Euros in operational efficiency, if they used big data effectively.
		</span>
		<span onclick="videoSeek('785.033');" style="cursor: pointer;" id="caption-en-89" class="caption">
		And in the US, US. Health care is one of the most expensive ones.
		</span>
		<span onclick="videoSeek('788.6');" style="cursor: pointer;" id="caption-en-90" class="caption">
		And they found that if big data is properly used, then they could save about 300 billion dollars each year.
		</span>
		<span onclick="videoSeek('799.1');" style="cursor: pointer;" id="caption-en-91" class="caption">
		And of course, enterprises could benefit several ways, for example, there could be a lot of new applications.
		</span>
		<span onclick="videoSeek('805.5');" style="cursor: pointer;" id="caption-en-92" class="caption">
		They could collect data, analyze the data and improve the services that they're offering, and improve the products that they're offering.
		</span>
		<span onclick="videoSeek('813.733');" style="cursor: pointer;" id="caption-en-93" class="caption">
		Similar, a major city, for example, a US city is cutting crime and improving municipal services by collecting data and analyzing geospatial data in real-time for over 30 different departments.
		</span>
		<span onclick="videoSeek('826.966');" style="cursor: pointer;" id="caption-en-94" class="caption">
		So, they have an understanding of how the departments are working, and then they can improve their efficiency.
		</span>
		<span onclick="videoSeek('834.833');" style="cursor: pointer;" id="caption-en-95" class="caption">
		And creating transparency is one thing, for example, today, each person may have some data, each department may have some data.
		</span>
		<span onclick="videoSeek('843.9');" style="cursor: pointer;" id="caption-en-96" class="caption">
		But, however, in a larger environments, unless this data is being shared, the organization itself may not benefit from this data being collected by individuals, or individual groups.
		</span>
		<span onclick="videoSeek('855.366');" style="cursor: pointer;" id="caption-en-97" class="caption">
		So big data, however, when somebody introduces big data, then the data that individuals are collecting or a particular census is collecting, is going to a big pool.
		</span>
		<span onclick="videoSeek('866.5');" style="cursor: pointer;" id="caption-en-98" class="caption">
		And then once that is accessible to other groups, they will also be able to benefit from this.
		</span>
		<span onclick="videoSeek('873.366');" style="cursor: pointer;" id="caption-en-99" class="caption">
		And this is the advantage of having big data, so that data that is collected by individuals or individual census can now be made available to a lot of other groups in the organization.
		</span>
		<span onclick="videoSeek('887.866');" style="cursor: pointer;" id="caption-en-100" class="caption">
		And marketers, of course, always want to segment people, for example insurance companies know that one product is not going to be sufficient for all, and therefore they would like to know, given the population, what kind of groups do we have among this and that's what is called a segmentation.
		</span>
		<span onclick="videoSeek('906.833');" style="cursor: pointer;" id="caption-en-101" class="caption">
		And therefore, they can come up with a product for different groups of people.
		</span>
		<span onclick="videoSeek('912.1');" style="cursor: pointer;" id="caption-en-102" class="caption">
		So the big data definitely comes to action here.
		</span>
		<span onclick="videoSeek('915.6');" style="cursor: pointer;" id="caption-en-103" class="caption">
		And we will look into more later on, on how to do this.
		</span>
		<span onclick="videoSeek('921.033');" style="cursor: pointer;" id="caption-en-104" class="caption">
		And next thing is today, for example, many decisions may be through human, for example, somebody says, I feel that this is my gut feeling.
		</span>
		<span onclick="videoSeek('929.5');" style="cursor: pointer;" id="caption-en-105" class="caption">
		However, that may not be the right thing.
		</span>
		<span onclick="videoSeek('932.033');" style="cursor: pointer;" id="caption-en-106" class="caption">
		But today, using the big data, we can automate a lot of these decisions.
		</span>
		<span onclick="videoSeek('937.466');" style="cursor: pointer;" id="caption-en-107" class="caption">
		Or at least they can support these decisions.
		</span>
		<span onclick="videoSeek('942.466');" style="cursor: pointer;" id="caption-en-108" class="caption">
		And as all of you have already seen, lot of new products are coming because of the big data.
		</span>
		<span onclick="videoSeek('949.3');" style="cursor: pointer;" id="caption-en-109" class="caption">
		For example, in health care, people start analyzing the clinical data that is observed and therefore, they are able to prescribe preventive care program, develop preventive care programs and targeting appropriate groups of individuals.
		</span>
		<span onclick="videoSeek('966.433');" style="cursor: pointer;" id="caption-en-110" class="caption">
		And let's look at the case study, UPS, United Parcel Service, many of you may be familiar with this.
		</span>
		<span onclick="videoSeek('975.666');" style="cursor: pointer;" id="caption-en-111" class="caption">
		They have started using this since the 1980's. They're one of the first ones to use this commercially.
		</span>
		<span onclick="videoSeek('983.233');" style="cursor: pointer;" id="caption-en-112" class="caption">
		The company now tracks about 16.3 million packages per day for 8.8 million customers, with an average of 39.5 million tracking requests from customers per day.
		</span>
		<span onclick="videoSeek('994.633');" style="cursor: pointer;" id="caption-en-113" class="caption">
		So this is really a large organization.
		</span>
		<span onclick="videoSeek('999.4');" style="cursor: pointer;" id="caption-en-114" class="caption">
		And for example, the company stores 16 petabytes of data, and it monitors the performance of more than 46,000 vehicles in its fleet.
		</span>
		<span onclick="videoSeek('1010.333');" style="cursor: pointer;" id="caption-en-115" class="caption">
		And for example the trucks, are being monitored for their speed, direction, when they break, and what route they take.
		</span>
		<span onclick="videoSeek('1023.633');" style="cursor: pointer;" id="caption-en-116" class="caption">
		And they use all of this information to redesign their route structures.
		</span>
		<span onclick="videoSeek('1030.1');" style="cursor: pointer;" id="caption-en-117" class="caption">
		And majority of the data of this comes from telematics sensors, which are installed in the vans.
		</span>
		<span onclick="videoSeek('1036.666');" style="cursor: pointer;" id="caption-en-118" class="caption">
		As you can see, a telematics sensor is being put in the van.
		</span>
		<span onclick="videoSeek('1043.5');" style="cursor: pointer;" id="caption-en-119" class="caption">
		And the system they have is ORION, or On-Road Integrated Optimization Navigation.
		</span>
		<span onclick="videoSeek('1048.933');" style="cursor: pointer;" id="caption-en-120" class="caption">
		This was actually developed initially in-house at UPS, and now they sold off, and therefore it's being used by many other systems.
		</span>
		<span onclick="videoSeek('1057.5');" style="cursor: pointer;" id="caption-en-121" class="caption">
		And the company estimates that it led to a savings of astonishing 30 million per year.
		</span>
		<span onclick="videoSeek('1065.4');" style="cursor: pointer;" id="caption-en-122" class="caption">
		And so what we have done in this talk, this is part one of lecture one.
		</span>
		<span onclick="videoSeek('1070.6');" style="cursor: pointer;" id="caption-en-123" class="caption">
		We have looked at basic definitions of big data.
		</span>
		<span onclick="videoSeek('1073.9');" style="cursor: pointer;" id="caption-en-124" class="caption">
		And the shifts in the paradigm, in thinking.
		</span>
		<span onclick="videoSeek('1077.566');" style="cursor: pointer;" id="caption-en-125" class="caption">
		And the 4V's, that is the volume, velocity, variety, and variability.
		</span>
		<span onclick="videoSeek('1085.2');" style="cursor: pointer;" id="caption-en-126" class="caption">
		Where does the data come from?
		</span>
		<span onclick="videoSeek('1087.066');" style="cursor: pointer;" id="caption-en-127" class="caption">
		That is the data sources. And how to create the value through big data.
		</span>
		<span onclick="videoSeek('1091.833');" style="cursor: pointer;" id="caption-en-128" class="caption">
		So, this is what we have done in this lecture, part one of this lecture one.
		</span>
		<span onclick="videoSeek('1096.733');" style="cursor: pointer;" id="caption-en-129" class="caption">
		And followed by this, there be will, one multiple choice question, you need to answer.
		</span>
		<span onclick="videoSeek('1102.566');" style="cursor: pointer;" id="caption-en-130" class="caption">
		Thank you.
		</span>
		</div>
	
  </body>
</html>