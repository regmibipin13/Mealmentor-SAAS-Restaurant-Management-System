"use strict";(self.webpackChunktrello_client=self.webpackChunktrello_client||[]).push([[95771],{"./packages/feature-flag-client/src/getRecordedFeatureFlag.ts":(e,a,r)=>{function t(e,a){var r,t;const i=function(e){let a=null;const r=window.localStorage,t=r?r.getItem(e):null;if(t)try{a=JSON.parse(t)}catch(e){console.warn(e)}return a}("featureFlagSnapshot"),{remote:o={},overrides:s={}}=null!=i?i:{};return null!==(r=null!==(t=s[e])&&void 0!==t?t:o[e])&&void 0!==r?r:a}r.d(a,{T:()=>t})},"./packages/quickload/src/cleanPreload.ts":(e,a,r)=>{r.d(a,{Y:()=>t});const t=e=>({isLoading:e.isLoading,start:e.start,used:e.used,url:e.url})},"./packages/quickload/src/formatUrl.ts":(e,a,r)=>{r.d(a,{C:()=>i});var t=r("./packages/session-cookie/src/getInvitationTokens.ts");const i=(e,a)=>{var r,i;let{rootId:o,idModel:s}=a,d=e.replace(o,s);const n=null===(r=window)||void 0===r||null===(i=r.document)||void 0===i?void 0:i.cookie;if(new RegExp("^/1/search").test(e)){var C;const e=null===(C=/dsc=([^;]+)/.exec(n))||void 0===C?void 0:C[1];d+=`&dsc=${null!=e?e:"undefined"}`}const l=(0,t.Y)();return d+=l?`&invitationTokens=${l}`:"",d}},"./packages/quickload/src/getPreloadsFromPath.ts":(e,a,r)=>{r.d(a,{k:()=>s});const t={header:{taskName:null,requests:[{url:"/1/member/:idMember?fields=id%2CaaId%2CactivityBlocked%2CavatarHash%2CavatarUrl%2Cbio%2CbioData%2Cconfirmed%2CfullName%2CgoldSunsetFreeTrialIdOrganization%2CidEnterprise%2CidEnterprisesDeactivated%2CidMemberReferrer%2CidPremOrgsAdmin%2Cinitials%2CmemberType%2CnonPublic%2CnonPublicAvailable%2Cproducts%2Curl%2Cusername%2Cstatus%2CaaBlockSyncUntil%2CaaEmail%2CavatarSource%2CcredentialsRemovedCount%2CdomainClaimed%2Cemail%2CgravatarHash%2CidBoards%2CidOrganizations%2CidEnterprisesAdmin%2Climits%2CloginTypes%2CmarketingOptIn%2CmessagesDismissed%2ConeTimeMessagesDismissed%2Cprefs%2Ctrophies%2CuploadedAvatarHash%2CuploadedAvatarUrl%2CpremiumFeatures%2CisAaMastered%2CixUpdate%2CrequiresAaOnboarding&teamify=true&campaigns=true&channels=true&logins=true&organizations=all&organization_fields=id%2Cname%2CdisplayName%2CidEnterprise%2Cproducts%2ClogoHash&organization_paidAccount=true&organization_paidAccount_fields=products%2CinvoiceDetails%2CcanRenew%2CexpirationDates%2CbillingDates%2CdateFirstSubscription%2CcontactLocale%2CcontactEmail%2CcontactFullName%2CcardLast4%2CcardType%2Cstanding%2CixSubscriber%2Czip%2Ccountry%2CtaxId%2CstateTaxId%2CtrialType%2CtrialExpiration%2CpreviousSubscription%2CpaidProduct%2CproductOverride%2CscheduledChange%2CneedsCreditCardUpdate%2CdatePendingDisabled&organization_enterprise=true&paidAccount=true&paidAccount_fields=products%2CinvoiceDetails%2CcanRenew%2CexpirationDates%2CbillingDates%2CdateFirstSubscription%2CcontactLocale%2CcontactEmail%2CcontactFullName%2CcardLast4%2CcardType%2Cstanding%2CixSubscriber%2Czip%2Ccountry%2CtaxId%2CstateTaxId%2CtrialType%2CtrialExpiration%2CpreviousSubscription%2CpaidProduct%2CproductOverride%2CscheduledChange%2CneedsCreditCardUpdate%2CdatePendingDisabled&pluginData=true&savedSearches=true&enterpriseToExplicitlyOwnBoards=true&enterpriseLicenses=true&enterprises=true&enterprise_filter=saml%2Cmember%2Cmember-unconfirmed%2Cowned&enterprise_fields=name%2CdisplayName%2CisRealEnterprise%2Cid%2CidAdmins%2CorganizationPrefs%2Cprefs&enterpriseWithRequiredConversion=true&domain=true&domain_fields=displayName",rootId:":idMember",operationName:"quickload:MemberHeader",modelName:"Member"},{url:"/1/member/:idMember?fields=id&boards=open%2Cstarred&board_fields=name%2Cclosed%2CdateLastActivity%2CdateLastView%2CdatePluginDisable%2CenterpriseOwned%2Cid%2CidOrganization%2Cprefs%2CpremiumFeatures%2CshortLink%2CshortUrl%2Curl%2CcreationMethod%2CidEnterprise%2Csubscribed&board_organization=true&board_organization_fields=id%2Cname%2CdisplayName%2Cproducts%2Cprefs%2CpremiumFeatures%2ClogoHash%2CidEnterprise%2Climits%2Ccredits&board_memberships=me&boardStars=true&credits=invitation%2CpromoCode&organizations=all&organization_fields=id%2CpremiumFeatures%2Cprefs%2Climits%2Ccredits%2Cmemberships",rootId:":idMember",operationName:"quickload:MemberBoards",modelName:"Member"}]},"^/b/([^/]+)":{taskName:"view-board",requests:[{url:"/1/board/:idBoard?fields=name%2Cclosed%2CdateLastActivity%2CdateLastView%2CdatePluginDisable%2CenterpriseOwned%2Cid%2CidOrganization%2Cprefs%2CpremiumFeatures%2CshortLink%2CshortUrl%2Curl%2CcreationMethod%2CidEnterprise%2Cdesc%2CdescData%2CidTags%2ClabelNames%2Climits%2Cmemberships%2CpowerUps%2Csubscribed%2CtemplateGallery&organization_disable_mock=true&memberships_orgMemberType=true&lists=open&list_fields=name%2Cclosed%2Cid%2CidBoard%2Cpos%2Csubscribed%2Climits%2CcreationMethod%2CsoftLimit&cards=visible&card_fields=badges%2CcardRole%2Cclosed%2CdateLastActivity%2Cdesc%2CdescData%2Cdue%2CdueComplete%2CdueReminder%2Cid%2CidAttachmentCover%2CidList%2CidBoard%2CidMembers%2CidShort%2CidLabels%2Climits%2Cname%2Cpos%2CshortUrl%2CshortLink%2Csubscribed%2Curl%2ClocationName%2Caddress%2Ccoordinates%2Ccover%2CisTemplate%2Cstart%2Clabels&card_customFieldItems=true&card_attachments=true&card_attachment_fields=bytes%2Cdate%2CedgeColor%2CfileName%2Cid%2CidMember%2CisUpload%2CmimeType%2Cname%2Cpos%2Curl&card_stickers=true&card_pluginData=true&card_checklists=all&card_checklist_fields=id%2CidBoard%2CidCard%2Cname%2Cpos&card_checklist_checkItems=none&enterprise=true&enterprise_fields=displayName%2Cid&members=all&member_fields=activityBlocked%2CavatarUrl%2CavatarSource%2Cbio%2CbioData%2Cconfirmed%2CfullName%2Cid%2CidEnterprise%2CidMemberReferrer%2Cinitials%2CmemberType%2CnonPublicAvailable%2CnonPublic%2Cproducts%2Curl%2Cusername&organization=true&organization_fields=name%2CdisplayName%2Cdesc%2CdescData%2Cid%2Curl%2Cwebsite%2Cprefs%2Cmemberships%2ClogoHash%2Cproducts%2Climits%2CidEnterprise%2CpremiumFeatures&organization_memberships=all&organization_tags=true&organization_enterprise=true&organization_pluginData=true&myPrefs=true&pluginData=true&boardPlugins=true&customFields=true&labels=all&label_fields=id%2Cname%2CidBoard%2Ccolor&labels_limit=1000",rootId:":idBoard",operationName:"quickload:CurrentBoardFull",modelName:"Board"},{url:"/1/board/:idBoard?fields=id&actions=addAttachmentToCard%2CaddChecklistToCard%2CaddMemberToBoard%2CaddMemberToCard%2CaddToOrganizationBoard%2CcommentCard%2CconvertToCardFromCheckItem%2CcopyBoard%2CcopyCard%2CcopyCommentCard%2CcreateBoard%2CcreateCard%2CcreateList%2CcreateCustomField%2CdeleteAttachmentFromCard%2CdeleteCard%2CdeleteCustomField%2CdisablePlugin%2CdisablePowerUp%2CemailCard%2CenablePlugin%2CenablePowerUp%2CmakeAdminOfBoard%2CmakeNormalMemberOfBoard%2CmakeObserverOfBoard%2CmoveCardFromBoard%2CmoveCardToBoard%2CmoveListFromBoard%2CmoveListToBoard%2CremoveChecklistFromCard%2CremoveDeprecatedPlugin%2CremoveFromOrganizationBoard%2CremoveMemberFromCard%2CunconfirmedBoardInvitation%2CunconfirmedOrganizationInvitation%2CupdateBoard%2CupdateCard%3AidList%2CupdateCard%3Aclosed%2CupdateCard%3Adue%2CupdateCard%3AdueComplete%2CupdateCheckItemStateOnCard%2CupdateCustomField%2CupdateCustomFieldItem%2CupdateList%3Aclosed&actions_limit=50&actions_display=true&action_fields=data%2Cdate%2Cdisplay%2Cid%2CidMemberCreator%2Ctype&action_memberCreator=true&action_memberCreator_fields=activityBlocked%2CavatarUrl%2Cbio%2CbioData%2Cconfirmed%2CidEnterprise%2CmemberType%2Cproducts%2Curl%2CfullName%2Cid%2CidMemberReferrer%2CidPremOrgsAdmin%2Cinitials%2CnonPublic%2CnonPublicAvailable%2Cusername",rootId:":idBoard",operationName:"quickload:CurrentBoardActions",modelName:"Board"}]},"^//([^/]*([^/]+))$":{taskName:null,requests:[{url:"/1/member/:idMember?fields=id&boards=open%2Cstarred&board_fields=name%2Cclosed%2CdateLastActivity%2CdateLastView%2CdatePluginDisable%2CenterpriseOwned%2Cid%2CidOrganization%2Cprefs%2CpremiumFeatures%2CshortLink%2CshortUrl%2Curl%2CcreationMethod%2CidEnterprise&boardStars=true",rootId:":idMember",operationName:"quickload:MemberQuickBoards",modelName:"Member"},{url:"/1/search?query=:searchTerm&partial=true&modelTypes=boards&board_fields=name%2Cclosed%2CdateLastActivity%2CdateLastView%2CdatePluginDisable%2CenterpriseOwned%2Cid%2CidOrganization%2Cprefs%2CpremiumFeatures%2CshortLink%2CshortUrl%2Curl%2CcreationMethod%2CidEnterprise",rootId:":searchTerm",operationName:"quickload:QuickBoardsSearch",modelName:"Search"}]},"^/search":{taskName:null,requests:[{url:"/1/member/:idMember?fields=id&boards=open%2Cstarred&board_fields=name%2Cclosed%2CdateLastActivity%2CdateLastView%2CdatePluginDisable%2CenterpriseOwned%2Cid%2CidOrganization%2Cprefs%2CpremiumFeatures%2CshortLink%2CshortUrl%2Curl%2CcreationMethod%2CidEnterprise&boardStars=true",rootId:":idMember",operationName:"quickload:MemberQuickBoards",modelName:"Member"}]},"^//$":{taskName:null,requests:[{url:"/1/member/:idMember?fields=id&boards=open%2Cstarred&board_fields=name%2Cclosed%2CdateLastActivity%2CdateLastView%2CdatePluginDisable%2CenterpriseOwned%2Cid%2CidOrganization%2Cprefs%2CpremiumFeatures%2CshortLink%2CshortUrl%2Curl%2CcreationMethod%2CidEnterprise&boardStars=true",rootId:":idMember",operationName:"quickload:MemberQuickBoards",modelName:"Member"}]},"^/c/([^/]+)":{taskName:"view-board",requests:[{url:"/1/card/:idCard?fields=id%2Cbadges%2Cclosed%2CdueComplete%2CdateLastActivity%2Cdesc%2CdescData%2Cdue%2CdueReminder%2Cemail%2CidBoard%2CidChecklists%2CidList%2CidMembers%2CidMembersVoted%2CidShort%2CidAttachmentCover%2Clabels%2CidLabels%2CmanualCoverAttachment%2Cname%2Cpos%2CshortLink%2CshortUrl%2Cstart%2Csubscribed%2Curl%2Ccover%2CisTemplate%2CcardRole&stickers=true&sticker_fields=id%2Ctop%2Cleft%2CzIndex%2Crotate%2Cimage%2CimageUrl%2CimageScaled&attachments=true&attachment_fields=id%2Cbytes%2Cdate%2CedgeColor%2CfileName%2CidMember%2CisUpload%2CmimeType%2Cname%2Cpos%2Cpreviews%2Curl&customFieldItems=true&pluginData=true",rootId:":idCard",operationName:"quickload:PreloadCard",modelName:"Card"}]},"^/w/([^/]+)/billing$":{taskName:null,requests:[{url:"/1/organization/:idOrganization?fields=id%2Ccredits%2CdisplayName%2CidEnterprise%2Cmemberships%2Cname%2Cprefs%2Cproducts&enterprise=true&memberships=active",rootId:":idOrganization",operationName:"quickload:OrganizationBillingPage",modelName:"Organization"}]},"^/([^/]+)/billing$":{taskName:null,requests:[{url:"/1/organization/:idOrganization?fields=id%2Ccredits%2CdisplayName%2CidEnterprise%2Cmemberships%2Cname%2Cprefs%2Cproducts&enterprise=true&memberships=active",rootId:":idOrganization",operationName:"quickload:OrganizationBillingPage",modelName:"Organization"}]},"^/w/(?!search)(?!create-first-team)(?!blank)(?!shortcuts)(?!templates)(?!redeem)([^/]+)$":{taskName:null,requests:[{url:"/1/organization/:idOrganization?fields=id%2Cname%2CdisplayName%2Cproducts%2Cprefs%2CpremiumFeatures%2ClogoHash%2CidEnterprise%2Cdesc%2CdescData%2Cwebsite%2CbillableCollaboratorCount%2Climits%2Ccredits%2Cmemberships&tags=true&memberships=active&paidAccount=true&paidAccount_fields=products%2CinvoiceDetails%2CcanRenew%2CexpirationDates%2CbillingDates%2CdateFirstSubscription%2CcontactLocale%2CcontactEmail%2CcontactFullName%2CcardLast4%2CcardType%2Cstanding%2CixSubscriber%2Czip%2Ccountry%2CtaxId%2CstateTaxId%2CtrialType%2CtrialExpiration%2CpreviousSubscription%2CpaidProduct%2CproductOverride%2CscheduledChange%2CneedsCreditCardUpdate&enterprise=true&boards=open&boards_count=29&board_fields=name%2Cclosed%2CdateLastActivity%2CdatePluginDisable%2CenterpriseOwned%2Cid%2CidOrganization%2CshortLink%2Cprefs%2CpremiumFeatures%2CshortUrl%2Curl%2CcreationMethod%2CidEnterprise%2CidTags&boards_sortBy=dateLastActivity&boards_sortOrder=desc",rootId:":idOrganization",operationName:"quickload:WorkspaceBoardsPageMinimal",modelName:"Organization"}]},"^/(?!search)(?!create-first-team)(?!blank)(?!shortcuts)(?!templates)(?!redeem)([^/]+)$":{taskName:null,requests:[{url:"/1/organization/:idOrganization?fields=id%2Cname%2CdisplayName%2Cproducts%2Cprefs%2CpremiumFeatures%2ClogoHash%2CidEnterprise%2Cdesc%2CdescData%2Cwebsite%2CbillableCollaboratorCount%2Climits%2Ccredits%2Cmemberships&tags=true&memberships=active&paidAccount=true&paidAccount_fields=products%2CinvoiceDetails%2CcanRenew%2CexpirationDates%2CbillingDates%2CdateFirstSubscription%2CcontactLocale%2CcontactEmail%2CcontactFullName%2CcardLast4%2CcardType%2Cstanding%2CixSubscriber%2Czip%2Ccountry%2CtaxId%2CstateTaxId%2CtrialType%2CtrialExpiration%2CpreviousSubscription%2CpaidProduct%2CproductOverride%2CscheduledChange%2CneedsCreditCardUpdate&enterprise=true&boards=open&boards_count=29&board_fields=name%2Cclosed%2CdateLastActivity%2CdatePluginDisable%2CenterpriseOwned%2Cid%2CidOrganization%2CshortLink%2Cprefs%2CpremiumFeatures%2CshortUrl%2Curl%2CcreationMethod%2CidEnterprise%2CidTags&boards_sortBy=dateLastActivity&boards_sortOrder=desc",rootId:":idOrganization",operationName:"quickload:WorkspaceBoardsPageMinimal",modelName:"Organization"}]},"^/w/([^/]+)/home$":{taskName:null,requests:[{url:"/1/organization/:idOrganization?fields=id%2Cname%2CdisplayName%2Cproducts%2Cprefs%2CpremiumFeatures%2ClogoHash%2CidEnterprise%2Cdesc%2CdescData%2Cwebsite%2CbillableCollaboratorCount%2Climits%2Ccredits%2Cmemberships&tags=true&memberships=active&members=all&member_fields=id&paidAccount=true&paidAccount_fields=products%2CinvoiceDetails%2CcanRenew%2CexpirationDates%2CbillingDates%2CdateFirstSubscription%2CcontactLocale%2CcontactEmail%2CcontactFullName%2CcardLast4%2CcardType%2Cstanding%2CixSubscriber%2Czip%2Ccountry%2CtaxId%2CstateTaxId%2CtrialType%2CtrialExpiration%2CpreviousSubscription%2CpaidProduct%2CproductOverride%2CscheduledChange%2CneedsCreditCardUpdate&enterprise=true&boards=open&boards_count=100&board_fields=name%2Cclosed%2CdateLastActivity%2CdateLastView%2CdatePluginDisable%2CenterpriseOwned%2Cid%2CidOrganization%2CshortLink%2Cprefs%2CpremiumFeatures%2CshortUrl%2Curl%2CcreationMethod%2CidEnterprise%2CidTags&boards_sortBy=dateLastActivity&boards_sortOrder=desc&board_starCounts=organization&board_membershipCounts=active",rootId:":idOrganization",operationName:"quickload:WorkspaceHomePageMinimal",modelName:"Organization"}]},"^/([^/]+)/home$":{taskName:null,requests:[{url:"/1/organization/:idOrganization?fields=id%2Cname%2CdisplayName%2Cproducts%2Cprefs%2CpremiumFeatures%2ClogoHash%2CidEnterprise%2Cdesc%2CdescData%2Cwebsite%2CbillableCollaboratorCount%2Climits%2Ccredits%2Cmemberships&tags=true&memberships=active&members=all&member_fields=id&paidAccount=true&paidAccount_fields=products%2CinvoiceDetails%2CcanRenew%2CexpirationDates%2CbillingDates%2CdateFirstSubscription%2CcontactLocale%2CcontactEmail%2CcontactFullName%2CcardLast4%2CcardType%2Cstanding%2CixSubscriber%2Czip%2Ccountry%2CtaxId%2CstateTaxId%2CtrialType%2CtrialExpiration%2CpreviousSubscription%2CpaidProduct%2CproductOverride%2CscheduledChange%2CneedsCreditCardUpdate&enterprise=true&boards=open&boards_count=100&board_fields=name%2Cclosed%2CdateLastActivity%2CdateLastView%2CdatePluginDisable%2CenterpriseOwned%2Cid%2CidOrganization%2CshortLink%2Cprefs%2CpremiumFeatures%2CshortUrl%2Curl%2CcreationMethod%2CidEnterprise%2CidTags&boards_sortBy=dateLastActivity&boards_sortOrder=desc&board_starCounts=organization&board_membershipCounts=active",rootId:":idOrganization",operationName:"quickload:WorkspaceHomePageMinimal",modelName:"Organization"}]}};var i=r("./packages/feature-flag-client/src/getRecordedFeatureFlag.ts"),o=r("./packages/quickload/src/formatUrl.ts");const s=function(){var e;let a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:window.location.pathname,r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:window.location.search;arguments.length>2&&void 0!==arguments[2]||window.document.cookie;const s=a.replace(/\?(.*)$/,""),d=Object.keys(t).find((e=>{const a=t[e].requests,r=new RegExp(e);return!!a.find((e=>!e.featureFlag||"true"===(0,i.T)(e.featureFlag,"false")))&&r.test(s)})),n=d&&t[d].requests.filter((e=>!e.featureFlag||"true"===(0,i.T)(e.featureFlag,"false"))),C=d&&t[d].taskName||null;let l=(null===(e=new RegExp(d||"").exec(s))||void 0===e?void 0:e[1])||"";new RegExp("^/search$").test(a)&&(l=new URLSearchParams(r).get("q")||"");const c=t.header.requests,u=c.concat(n||[]).map((e=>{let{url:a,rootId:r,operationName:t,modelName:i}=e;return{url:(0,o.C)(a,{rootId:r,idModel:":idMember"===r?"me":l}),operationName:t,modelName:i,queryName:t.replace("quickload:",""),taskName:C}}));return{path:s,preloads:u,param:l}}},"./packages/quickload/src/preloadsHash.ts":(e,a,r)=>{r.d(a,{M:()=>t});const t={}},"./packages/quickload/src/quickload.ts":(e,a,r)=>{r.d(a,{X:()=>p});var t=r("./packages/quickload/src/getPreloadsFromPath.ts");function i(e,a){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var t=Object.getOwnPropertySymbols(e);a&&(t=t.filter((function(a){return Object.getOwnPropertyDescriptor(e,a).enumerable}))),r.push.apply(r,t)}return r}function o(e,a,r){return a in e?Object.defineProperty(e,a,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[a]=r,e}var s=r("./packages/quickload/src/preloadsHash.ts"),d=r("./packages/quickload/src/cleanPreload.ts");const n=()=>{let e="";for(let a=0;a<16;a+=1){e+="0123456789abcdef"[Math.floor(16*Math.random())]}return e},C=function(e){try{return JSON.parse(e)}catch(e){return null}},l=function(e,a){let r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"unknown",t=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"model-loader",i=arguments.length>4?arguments[4]:void 0,o=arguments.length>5?arguments[5]:void 0;const s=new XMLHttpRequest;s.open("GET",e,!0),s.setRequestHeader("Accept","application/json,text/plain"),s.setRequestHeader("X-Trello-Client-Version",window.trelloVersion||"dev-0"),s.setRequestHeader("X-Trello-Operation-Source",t),s.setRequestHeader("X-Trello-Operation-Name",r),i&&(s.setRequestHeader("X-Trello-TraceId",i),s.setRequestHeader("X-Trello-Task",o||"not-implemented")),s.onreadystatechange=function(){4===s.readyState&&(200!==s.status?a([s.status,s.responseText]):a(null,[C(s.responseText),s]))},s.send(null)},c=function(e){e in s.M&&delete s.M[e]},u=function(e){let a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"preload",r=arguments.length>2?arguments[2]:void 0,t=arguments.length>3?arguments[3]:void 0;if(!e)return;const i={isLoading:!0,callbacks:[],start:Date.now(),used:!1,url:e,traceId:r};s.M[e]=i,l(e,(function(e,a){let r;if(i.isLoading=!1,e)for(r of(i.error=e,Array.from(i.callbacks)))r(e);else for(r of(i.data=a,Array.from(i.callbacks)))r(null,a)}),a,"quickload",r,t)},m={init(){const e=Math.floor(Date.now()/1e3).toString(16)+(n().slice(8)+n()),{preloads:a}=(0,t.k)();for(const{url:r,operationName:t,taskName:i}of a)u(r,t,e,i)},getPreloadsFromPath:t.k,makeUrl:function(e,a){let r,t;t=void 0===a?{}:function(e){for(var a=1;a<arguments.length;a++){var r=null!=arguments[a]?arguments[a]:{};a%2?i(Object(r),!0).forEach((function(a){o(e,a,r[a])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):i(Object(r)).forEach((function(a){Object.defineProperty(e,a,Object.getOwnPropertyDescriptor(r,a))}))}return e}({},a);const s=[],d=/invite-token-[-a-f0-9]*=([^;]+)/g;for(;void 0!==(r=null===(n=d.exec(document.cookie))||void 0===n?void 0:n[1]);){var n;s.push(unescape(r))}if(s.length>0&&(t.invitationTokens=s.join(",")),new RegExp("^/1/search(/|$)").test(e)){var C;const e=null===(C=/dsc=([^;]+)/.exec(document.cookie))||void 0===C?void 0:C[1];e&&(t.dsc=e)}const l=[];for(const e in t){const a=t[e];l.push([e,encodeURIComponent(a)].join("="))}return[e,l.join("&")].join("?")},load(e){let a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:()=>{},r=arguments.length>2?arguments[2]:void 0,t=arguments.length>3?arguments[3]:void 0,i=arguments.length>4?arguments[4]:void 0,o=arguments.length>5?arguments[5]:void 0;const n=s.M[e];if(void 0!==n)return n.used=!0,n.isLoading?n.callbacks.push(a):a(n.error,n.data),(0,d.Y)(n);l(e,a,r,t,i,o)},getPreloadTraceId(){const{preloads:e}=(0,t.k)();for(const{url:a}of e)if(a in s.M)return s.M[a].traceId},clear(){for(const e in s.M)c(e)},markComplete(){this.status="complete"},status:"pending"};m.init();const p=window.QuickLoad=m},"./packages/session-cookie/src/getInvitationTokens.ts":(e,a,r)=>{r.d(a,{Y:()=>t});const t=()=>{let e;const a=[],r=/invite-token-[-a-f0-9]*=([^;]+)/g;for(;e=null===(t=r.exec(document.cookie))||void 0===t?void 0:t[1];){var t;a.push(unescape(e))}if(a.length>0)return a.join(",")}}},e=>{var a;a="./packages/quickload/src/quickload.ts",e(e.s=a)}]);
//# sourceMappingURL=quickload.c29d29524ebb81e79d42.js.map